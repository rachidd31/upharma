<?php

namespace Webkul\Account\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Webkul\Account\Enums\MoveState;
use Webkul\Account\Enums\PaymentState;
use Webkul\Account\Enums\TypeTaxUse;
use Webkul\Account\Filament\Resources\RefundResource\Pages;
use Webkul\Account\Livewire\InvoiceSummary;
use Webkul\Account\Models\Move as AccountMove;
use Webkul\Account\Models\MoveLine;
use Webkul\Account\Models\Partner;
use Webkul\Account\Services\TaxService;
use Webkul\Field\Filament\Forms\Components\ProgressStepper;
use Webkul\Invoice\Models\Product;
use Webkul\Invoice\Settings;
use Webkul\Support\Models\Currency;
use Webkul\Support\Models\UOM;

class RefundResource extends Resource
{
    protected static ?string $model = AccountMove::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ProgressStepper::make('state')
                    ->hiddenLabel()
                    ->inline()
                    ->options(function ($record) {
                        $options = MoveState::options();

                        if (
                            $record
                            && $record->state != MoveState::CANCEL->value
                        ) {
                            unset($options[MoveState::CANCEL->value]);
                        }

                        if ($record == null) {
                            unset($options[MoveState::CANCEL->value]);
                        }

                        return $options;
                    })
                    ->default(MoveState::DRAFT->value)
                    ->columnSpan('full')
                    ->disabled()
                    ->live()
                    ->reactive(),
                Forms\Components\Section::make(__('accounts::filament/resources/refund.form.section.general.title'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('payment_state')
                                ->icon(fn ($record) => PaymentState::from($record->payment_state)->getIcon())
                                ->color(fn ($record) => PaymentState::from($record->payment_state)->getColor())
                                ->visible(fn ($record) => $record && in_array($record->payment_state, [PaymentState::PAID->value, PaymentState::REVERSED->value]))
                                ->label(fn ($record) => PaymentState::from($record->payment_state)->getLabel())
                                ->size(ActionSize::ExtraLarge->value),
                        ]),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.vendor-credit-note'))
                                    ->required()
                                    ->maxLength(255)
                                    ->extraInputAttributes(['style' => 'font-size: 1.5rem;height: 3rem;'])
                                    ->placeholder('RBILL/2025/00001')
                                    ->default(fn () => AccountMove::generateNextInvoiceAndCreditNoteNumber('RBILL'))
                                    ->unique(
                                        table: 'accounts_account_moves',
                                        column: 'name',
                                        ignoreRecord: true,
                                    )
                                    ->columnSpan(1)
                                    ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                            ])->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\Select::make('partner_id')
                                            ->label(__('accounts::filament/resources/refund.form.section.general.fields.vendor'))
                                            ->relationship(
                                                'partner',
                                                'name',
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->live()
                                            ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                        Forms\Components\Placeholder::make('partner_address')
                                            ->hiddenLabel()
                                            ->visible(
                                                fn (Get $get) => Partner::with('addresses')->find($get('partner_id'))?->addresses->isNotEmpty()
                                            )
                                            ->content(function (Get $get) {
                                                $partner = Partner::with('addresses.state', 'addresses.country')->find($get('partner_id'));

                                                if (
                                                    ! $partner
                                                    || $partner->addresses->isEmpty()
                                                ) {
                                                    return null;
                                                }

                                                $address = $partner->addresses->first();

                                                return sprintf(
                                                    "%s\n%s%s\n%s, %s %s\n%s",
                                                    $address->name ?? '',
                                                    $address->street1 ?? '',
                                                    $address->street2 ? ', '.$address->street2 : '',
                                                    $address->city ?? '',
                                                    $address->state ? $address->state->name : '',
                                                    $address->zip ?? '',
                                                    $address->country ? $address->country->name : ''
                                                );
                                            }),
                                    ]),
                                Forms\Components\TextInput::make('reference')
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.bill-reference'))
                                    ->live()
                                    ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                Forms\Components\DatePicker::make('invoice_date')
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.bill-date'))
                                    ->default(now())
                                    ->native(false)
                                    ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                Forms\Components\DatePicker::make('date')
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.accounting-date'))
                                    ->default(now())
                                    ->native(false)
                                    ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                Forms\Components\Select::make('partner_bank_id')
                                    ->relationship('partnerBank', 'account_number')
                                    ->searchable()
                                    ->preload()
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.recipient-bank'))
                                    ->createOptionForm(fn ($form) => BankAccountResource::form($form))
                                    ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                Forms\Components\DatePicker::make('invoice_date_due')
                                    ->required()
                                    ->default(now())
                                    ->native(false)
                                    ->live()
                                    ->hidden(fn (Get $get) => $get('invoice_payment_term_id') !== null)
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.due-date')),
                                Forms\Components\Select::make('invoice_payment_term_id')
                                    ->relationship('invoicePaymentTerm', 'name')
                                    ->required(fn (Get $get) => $get('invoice_date_due') === null)
                                    ->live()
                                    ->searchable()
                                    ->preload()
                                    ->label(__('accounts::filament/resources/refund.form.section.general.fields.payment-term')),
                            ])->columns(2),
                    ]),
                Forms\Components\Tabs::make()
                    ->schema([
                        Forms\Components\Tabs\Tab::make(__('accounts::filament/resources/refund.form.tabs.invoice-lines.title'))
                            ->icon('heroicon-o-list-bullet')
                            ->schema([
                                static::getProductRepeater(),
                                Forms\Components\Livewire::make(InvoiceSummary::class, function (Forms\Get $get) {
                                    return [
                                        'currency' => Currency::find($get('currency_id')),
                                        'products' => $get('products'),
                                    ];
                                })
                                    ->live()
                                    ->reactive(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('accounts::filament/resources/refund.form.tabs.other-information.title'))
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Fieldset::make(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.accounting.title'))
                                    ->schema([
                                        Forms\Components\Select::make('invoice_incoterm_id')
                                            ->relationship('invoiceIncoterm', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.accounting.fields.incoterm')),
                                        Forms\Components\TextInput::make('incoterm_location')
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.accounting.fields.incoterm-location')),
                                    ]),
                                Forms\Components\Fieldset::make(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.secured.title'))
                                    ->schema([
                                        Forms\Components\Select::make('preferred_payment_method_line_id')
                                            ->relationship('paymentMethodLine', 'name')
                                            ->preload()
                                            ->searchable()
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.secured.fields.payment-method')),
                                        Forms\Components\Toggle::make('auto_post')
                                            ->inline(false)
                                            ->default(0)
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.secured.fields.auto-post'))
                                            ->disabled(fn ($record) => $record && in_array($record->state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                        Forms\Components\Toggle::make('checked')
                                            ->inline(false)
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.secured.fields.checked')),
                                    ]),
                                Forms\Components\Fieldset::make(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.additional-information.title'))
                                    ->schema([
                                        Forms\Components\Select::make('company_id')
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.additional-information.fields.company'))
                                            ->relationship('company', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->default(Auth::user()->default_company_id),
                                        Forms\Components\Select::make('currency_id')
                                            ->label(__('accounts::filament/resources/refund.form.tabs.other-information.fieldset.additional-information.fields.currency'))
                                            ->relationship('currency', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->live()
                                            ->reactive()
                                            ->default(Auth::user()->defaultCompany?->currency_id),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('accounts::filament/resources/refund.form.tabs.term-and-conditions.title'))
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                Forms\Components\RichEditor::make('narration')
                                    ->hiddenLabel(),
                            ]),
                    ])
                    ->persistTabInQueryString(),
            ])
            ->columns('full');
    }

    public static function table(Table $table): Table
    {
        return InvoiceResource::table($table);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make(__('accounts::filament/resources/refund.infolist.section.general.title'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Infolists\Components\Actions::make([
                            Infolists\Components\Actions\Action::make('payment_state')
                                ->icon(fn ($record) => PaymentState::from($record->payment_state)->getIcon())
                                ->color(fn ($record) => PaymentState::from($record->payment_state)->getColor())
                                ->visible(fn ($record) => $record && in_array($record->payment_state, [PaymentState::PAID->value, PaymentState::REVERSED->value]))
                                ->label(fn ($record) => PaymentState::from($record->payment_state)->getLabel())
                                ->size(ActionSize::ExtraLarge->value),
                        ]),
                        Infolists\Components\Grid::make()
                            ->schema([
                                Infolists\Components\TextEntry::make('name')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.vendor-invoice'))
                                    ->icon('heroicon-o-document')
                                    ->weight('bold')
                                    ->size(TextEntrySize::Large),
                            ])->columns(2),
                        Infolists\Components\Grid::make()
                            ->schema([
                                Infolists\Components\TextEntry::make('partner.name')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.vendor'))
                                    ->visible(fn ($record) => $record->partner_id !== null)
                                    ->icon('heroicon-o-user'),
                                Infolists\Components\TextEntry::make('invoice_partner_display_name')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.vendor'))
                                    ->visible(fn ($record) => $record->partner_id === null)
                                    ->icon('heroicon-o-user'),
                                Infolists\Components\TextEntry::make('invoice_date')
                                    ->date()
                                    ->icon('heroicon-o-calendar')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.bill-date')),
                                Infolists\Components\TextEntry::make('reference')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.bill-reference')),
                                Infolists\Components\TextEntry::make('date')
                                    ->icon('heroicon-o-calendar')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.accounting-date')),
                                Infolists\Components\TextEntry::make('payment_reference')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.payment-reference')),
                                Infolists\Components\TextEntry::make('partnerBank.account_number')
                                    ->placeholder('-')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.recipient-bank')),
                                Infolists\Components\TextEntry::make('invoice_date_due')
                                    ->icon('heroicon-o-clock')
                                    ->placeholder('-')
                                    ->date()
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.due-date')),
                                Infolists\Components\TextEntry::make('invoicePaymentTerm.name')
                                    ->placeholder('-')
                                    ->icon('heroicon-o-calendar-days')
                                    ->label(__('accounts::filament/resources/refund.infolist.section.general.entries.payment-term')),
                            ])->columns(2),
                    ]),
                Infolists\Components\Tabs::make()
                    ->columnSpan('full')
                    ->tabs([
                        Infolists\Components\Tabs\Tab::make(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.title'))
                            ->icon('heroicon-o-list-bullet')
                            ->schema([
                                Infolists\Components\RepeatableEntry::make('lines')
                                    ->hiddenLabel()
                                    ->schema([
                                        Infolists\Components\TextEntry::make('product.name')
                                            ->placeholder('-')
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.product'))
                                            ->icon('heroicon-o-cube'),
                                        Infolists\Components\TextEntry::make('quantity')
                                            ->placeholder('-')
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.quantity'))
                                            ->icon('heroicon-o-hashtag'),
                                        Infolists\Components\TextEntry::make('uom.name')
                                            ->placeholder('-')
                                            ->visible(fn (Settings\ProductSettings $settings) => $settings->enable_uom)
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.unit'))
                                            ->icon('heroicon-o-scale'),
                                        Infolists\Components\TextEntry::make('price_unit')
                                            ->placeholder('-')
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.unit-price'))
                                            ->icon('heroicon-o-currency-dollar')
                                            ->money(fn ($record) => $record->currency->code),
                                        Infolists\Components\TextEntry::make('discount')
                                            ->placeholder('-')
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.discount-percentage'))
                                            ->icon('heroicon-o-tag')
                                            ->suffix('%'),
                                        Infolists\Components\TextEntry::make('taxes.name')
                                            ->badge()
                                            ->state(function ($record): array {
                                                return $record->taxes->map(fn ($tax) => [
                                                    'name' => $tax->name,
                                                ])->toArray();
                                            })
                                            ->icon('heroicon-o-receipt-percent')
                                            ->formatStateUsing(fn ($state) => $state['name'])
                                            ->placeholder('-')
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.taxes'))
                                            ->weight(FontWeight::Bold),
                                        Infolists\Components\TextEntry::make('price_subtotal')
                                            ->placeholder('-')
                                            ->label(__('accounts::filament/resources/refund.infolist.tabs.invoice-lines.repeater.products.entries.sub-total'))
                                            ->icon('heroicon-o-calculator')
                                            ->money(fn ($record) => $record->currency->code),
                                    ])->columns(5),
                                Infolists\Components\Livewire::make(InvoiceSummary::class, function ($record) {
                                    return [
                                        'currency'  => $record->currency,
                                        'amountTax' => $record->amount_tax ?? 0,
                                        'products'  => $record->lines->map(function ($item) {
                                            return [
                                                ...$item->toArray(),
                                                'taxes' => $item->taxes->pluck('id')->toArray() ?? [],
                                            ];
                                        })->toArray(),
                                    ];
                                }),
                            ]),
                        Infolists\Components\Tabs\Tab::make(__('accounts::filament/resources/refund.infolist.tabs.other-information.title'))
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Infolists\Components\Section::make(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.accounting.title'))
                                    ->icon('heroicon-o-calculator')
                                    ->schema([
                                        Infolists\Components\Grid::make()
                                            ->schema([
                                                Infolists\Components\TextEntry::make('invoiceIncoterm.name')
                                                    ->placeholder('-')
                                                    ->label(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.accounting.entries.incoterm'))
                                                    ->icon('heroicon-o-globe-alt'),
                                                Infolists\Components\TextEntry::make('incoterm_location')
                                                    ->placeholder('-')
                                                    ->label(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.accounting.entries.incoterm-location'))
                                                    ->icon('heroicon-o-map-pin'),
                                            ])->columns(2),
                                    ]),
                                Infolists\Components\Section::make(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.secured.title'))
                                    ->icon('heroicon-o-shield-check')
                                    ->schema([
                                        Infolists\Components\Grid::make()
                                            ->schema([
                                                Infolists\Components\TextEntry::make('paymentMethodLine.name')
                                                    ->placeholder('-')
                                                    ->label(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.secured.entries.payment-method'))
                                                    ->icon('heroicon-o-credit-card'),
                                                Infolists\Components\IconEntry::make('auto_post')
                                                    ->placeholder('-')
                                                    ->boolean()
                                                    ->icon('heroicon-o-arrow-path')
                                                    ->label(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.secured.entries.auto-post')),
                                            ])->columns(2),
                                    ]),
                                Infolists\Components\Section::make(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.additional-information.title'))
                                    ->icon('heroicon-o-puzzle-piece')
                                    ->schema([
                                        Infolists\Components\Grid::make()
                                            ->schema([
                                                Infolists\Components\TextEntry::make('company.name')
                                                    ->placeholder('-')
                                                    ->icon('heroicon-o-building-office')
                                                    ->label(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.additional-information.entries.company')),
                                                Infolists\Components\TextEntry::make('currency.name')
                                                    ->placeholder('-')
                                                    ->icon('heroicon-o-arrow-path')
                                                    ->label(__('accounts::filament/resources/refund.infolist.tabs.other-information.fieldset.additional-information.entries.currency')),
                                            ])->columns(2),
                                    ]),
                            ]),
                        Infolists\Components\Tabs\Tab::make(__('accounts::filament/resources/refund.infolist.tabs.term-and-conditions.title'))
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                Infolists\Components\TextEntry::make('narration')
                                    ->html()
                                    ->hiddenLabel(),
                            ]),
                    ])
                    ->persistTabInQueryString(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListRefunds::route('/'),
            'create' => Pages\CreateRefund::route('/create'),
            'edit'   => Pages\EditRefund::route('/{record}/edit'),
            'view'   => Pages\ViewRefund::route('/{record}'),
        ];
    }

    public static function getProductRepeater(): Forms\Components\Repeater
    {
        return Forms\Components\Repeater::make('products')
            ->relationship('lines')
            ->hiddenLabel()
            ->live()
            ->reactive()
            ->label(__('Products'))
            ->addActionLabel(__('Add Product'))
            ->collapsible()
            ->defaultItems(0)
            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
            ->deleteAction(fn (Forms\Components\Actions\Action $action) => $action->requiresConfirmation())
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Grid::make(4)
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label(__('Product'))
                                    ->relationship('product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value]))
                                    ->afterStateUpdated(fn (Forms\Set $set, Forms\Get $get) => static::afterProductUpdated($set, $get))
                                    ->required(),
                                Forms\Components\TextInput::make('quantity')
                                    ->label(__('Quantity'))
                                    ->required()
                                    ->default(1)
                                    ->numeric()
                                    ->live()
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value]))
                                    ->afterStateUpdated(fn (Forms\Set $set, Forms\Get $get) => static::afterProductQtyUpdated($set, $get)),
                                Forms\Components\Select::make('uom_id')
                                    ->label(__('Unit'))
                                    ->relationship(
                                        'uom',
                                        'name',
                                        fn ($query) => $query->where('category_id', 1)->orderBy('id'),
                                    )
                                    ->required()
                                    ->live()
                                    ->selectablePlaceholder(false)
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value]))
                                    ->afterStateUpdated(fn (Forms\Set $set, Forms\Get $get) => static::afterUOMUpdated($set, $get))
                                    ->visible(fn (Settings\ProductSettings $settings) => $settings->enable_uom),
                                Forms\Components\Select::make('taxes')
                                    ->label(__('Taxes'))
                                    ->relationship(
                                        'taxes',
                                        'name',
                                        function (Builder $query) {
                                            return $query->where('type_tax_use', TypeTaxUse::PURCHASE->value);
                                        },
                                    )
                                    ->searchable()
                                    ->multiple()
                                    ->preload()
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value]))
                                    ->afterStateHydrated(fn (Forms\Get $get, Forms\Set $set) => self::calculateLineTotals($set, $get))
                                    ->afterStateUpdated(fn (Forms\Get $get, Forms\Set $set, $state) => self::calculateLineTotals($set, $get))
                                    ->live(),
                                Forms\Components\TextInput::make('discount')
                                    ->label(__('Discount Percentage'))
                                    ->numeric()
                                    ->default(0)
                                    ->live()
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value]))
                                    ->afterStateUpdated(fn (Forms\Set $set, Forms\Get $get) => self::calculateLineTotals($set, $get)),
                                Forms\Components\TextInput::make('price_unit')
                                    ->label(__('Unit Price'))
                                    ->numeric()
                                    ->default(0)
                                    ->required()
                                    ->live()
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value]))
                                    ->afterStateUpdated(fn (Forms\Set $set, Forms\Get $get) => self::calculateLineTotals($set, $get)),
                                Forms\Components\TextInput::make('price_subtotal')
                                    ->label(__('Sub Total'))
                                    ->default(0)
                                    ->dehydrated()
                                    ->disabled(fn ($record) => $record && in_array($record->parent_state, [MoveState::POSTED->value, MoveState::CANCEL->value])),
                                Forms\Components\Hidden::make('product_uom_qty')
                                    ->default(0),
                                Forms\Components\Hidden::make('price_tax')
                                    ->default(0),
                                Forms\Components\Hidden::make('price_total')
                                    ->default(0),
                            ]),
                    ])
                    ->columns(2),
            ])
            ->mutateRelationshipDataBeforeCreateUsing(fn (array $data, $record, $livewire) => static::mutateProductRelationship($data, $record, $livewire))
            ->mutateRelationshipDataBeforeSaveUsing(fn (array $data, $record, $livewire) => static::mutateProductRelationship($data, $record, $livewire));
    }

    public static function mutateProductRelationship(array $data, $record, $livewire): array
    {
        $data['product_id'] ??= $record->product_id;
        $data['quantity'] ??= $record->quantity;
        $data['uom_id'] ??= $record->uom_id;
        $data['price_subtotal'] ??= $record->price_subtotal;
        $data['discount'] ??= $record->discount;
        $data['discount_date'] ??= $record->discount_date;

        $product = Product::find($data['product_id']);

        $user = Auth::user();

        $data = array_merge($data, [
            'name'                  => $product->name,
            'quantity'              => $data['quantity'],
            'uom_id'                => $data['uom_id'] ?? $product->uom_id,
            'currency_id'           => ($livewire->data['currency_id'] ?? $record->currency_id) ?? $user->defaultCompany->currency_id,
            'partner_id'            => $record->partner_id,
            'creator_id'            => $user->id,
            'company_id'            => $user->default_company_id,
            'company_currency_id'   => $user->defaultCompany->currency_id ?? $record->currency_id,
            'commercial_partner_id' => $livewire->record->partner_id,
            'display_type'          => 'product',
            'sort'                  => MoveLine::max('sort') + 1,
            'parent_state'          => $livewire->record->state ?? MoveState::DRAFT->value,
            'move_name'             => $livewire->record->name,
            'debit'                 => 0.00,
            'credit'                => floatval($data['price_subtotal']),
            'balance'               => -floatval($data['price_subtotal']),
            'amount_currency'       => -floatval($data['price_subtotal']),
        ]);

        if ($data['discount'] > 0) {
            $data['discount_date'] = now();
        } else {
            $data['discount_date'] = null;
        }

        return $data;
    }

    private static function afterProductUpdated(Forms\Set $set, Forms\Get $get): void
    {
        if (! $get('product_id')) {
            return;
        }

        $product = Product::find($get('product_id'));

        $set('uom_id', $product->uom_id);

        $priceUnit = static::calculateUnitPrice($get('uom_id'), $product->cost ?? $product->price);

        $set('price_unit', round($priceUnit, 2));

        $set('taxes', $product->productTaxes->pluck('id')->toArray());

        $uomQuantity = static::calculateUnitQuantity($get('uom_id'), $get('quantity'));

        $set('product_uom_qty', round($uomQuantity, 2));

        self::calculateLineTotals($set, $get);
    }

    private static function afterProductQtyUpdated(Forms\Set $set, Forms\Get $get): void
    {
        if (! $get('product_id')) {
            return;
        }

        $uomQuantity = static::calculateUnitQuantity($get('uom_id'), $get('quantity'));

        $set('product_uom_qty', round($uomQuantity, 2));

        self::calculateLineTotals($set, $get);
    }

    private static function afterUOMUpdated(Forms\Set $set, Forms\Get $get): void
    {
        if (! $get('product_id')) {
            return;
        }

        $uomQuantity = static::calculateUnitQuantity($get('uom_id'), $get('quantity'));

        $set('product_uom_qty', round($uomQuantity, 2));

        $product = Product::find($get('product_id'));

        $priceUnit = static::calculateUnitPrice($get('uom_id'), $product->cost ?? $product->price);

        $set('price_unit', round($priceUnit, 2));

        self::calculateLineTotals($set, $get);
    }

    private static function calculateUnitQuantity($uomId, $quantity)
    {
        if (! $uomId) {
            return $quantity;
        }

        $uom = Uom::find($uomId);

        return (float) ($quantity ?? 0) / $uom->factor;
    }

    private static function calculateUnitPrice($uomId, $price)
    {
        if (! $uomId) {
            return $price;
        }

        $uom = Uom::find($uomId);

        return (float) ($price / $uom->factor);
    }

    private static function calculateLineTotals(Forms\Set $set, Forms\Get $get): void
    {
        if (! $get('product_id')) {
            $set('price_unit', 0);

            $set('discount', 0);

            $set('price_tax', 0);

            $set('price_subtotal', 0);

            $set('price_total', 0);

            return;
        }

        $priceUnit = floatval($get('price_unit'));

        $quantity = floatval($get('quantity') ?? 1);

        $subTotal = $priceUnit * $quantity;

        $discountValue = floatval($get('discount') ?? 0);

        if ($discountValue > 0) {
            $discountAmount = $subTotal * ($discountValue / 100);

            $subTotal = $subTotal - $discountAmount;
        }

        $taxIds = $get('taxes') ?? [];

        [$subTotal, $taxAmount] = app(TaxService::class)->collectionTaxes($taxIds, $subTotal, $quantity);

        $set('price_subtotal', round($subTotal, 4));

        $set('price_tax', $taxAmount);

        $set('price_total', $subTotal + $taxAmount);
    }

    public static function collectTotals(AccountMove $record): void
    {
        $record->amount_untaxed = 0;
        $record->amount_tax = 0;
        $record->amount_total = 0;
        $record->amount_residual = 0;
        $record->amount_untaxed_signed = 0;
        $record->amount_untaxed_in_currency_signed = 0;
        $record->amount_tax_signed = 0;
        $record->amount_total_signed = 0;
        $record->amount_total_in_currency_signed = 0;
        $record->amount_residual_signed = 0;
        $newTaxEntries = [];

        foreach ($record->lines as $line) {
            [$line, $amountTax] = static::collectLineTotals($line, $newTaxEntries);

            $record->amount_untaxed += floatval($line->price_subtotal);
            $record->amount_tax += floatval($amountTax);
            $record->amount_total += floatval($line->price_total);

            $record->amount_untaxed_signed += floatval($line->price_subtotal);
            $record->amount_untaxed_in_currency_signed += floatval($line->price_subtotal);
            $record->amount_tax_signed += floatval($amountTax);
            $record->amount_total_signed += floatval($line->price_total);
            $record->amount_total_in_currency_signed += floatval($line->price_total);

            $record->amount_residual += floatval($line->price_total);
            $record->amount_residual_signed += floatval($line->price_total);
        }

        $record->save();

        static::updateOrCreatePaymentTermLine($record);
    }

    public static function collectLineTotals(MoveLine $line, &$newTaxEntries): array
    {
        $subTotal = $line->price_unit * $line->quantity;

        $discountAmount = 0;

        if ($line->discount > 0) {
            $discountAmount = $subTotal * ($line->discount / 100);

            $subTotal = $subTotal - $discountAmount;
        }

        $taxIds = $line->taxes->pluck('id')->toArray();

        [$subTotal, $taxAmount, $taxesComputed] = app(TaxService::class)->collectionTaxes($taxIds, $subTotal, $line->quantity);

        if ($taxAmount > 0) {
            static::updateOrCreateTaxLine($line, $subTotal, $taxesComputed, $newTaxEntries);
        }

        $line->price_subtotal = round($subTotal, 4);

        $line->price_total = $subTotal + $taxAmount;

        $line->save();

        return [
            $line,
            $taxAmount,
        ];
    }

    public static function updateOrCreatePaymentTermLine($move): void
    {
        $dateMaturity = $move->invoice_date_due;

        if ($move->invoicePaymentTerm && $move->invoicePaymentTerm->dueTerm?->nb_days) {
            $dateMaturity = $dateMaturity->addDays($move->invoicePaymentTerm->dueTerm->nb_days);
        }

        $data = [
            'move_name'                => $move->name,
            'move_id'                  => $move->id,
            'currency_id'              => $move->currency_id,
            'display_type'             => 'payment_term',
            'date_maturity'            => $dateMaturity,
            'partner_id'               => $move->partner_id,
            'company_currency_id'      => $move->company_currency_id,
            'company_id'               => $move->company_id,
            'sort'                     => MoveLine::max('sort') + 1,
            'commercial_partner_id'    => $move->partner_id,
            'date'                     => now(),
            'parent_state'             => $move->state,
            'debit'                    => $move->amount_total,
            'creator_id'               => $move->creator_id,
            'credit'                   => 0.00,
            'balance'                  => $move->amount_total,
            'amount_currency'          => $move->amount_total,
            'amount_residual'          => $move->amount_total,
            'amount_residual_currency' => $move->amount_total,
        ];

        MoveLine::updateOrCreate([
            'move_id'      => $move->id,
            'display_type' => 'payment_term',
        ], $data);
    }

    private static function updateOrCreateTaxLine($line, $subTotal, $taxesComputed, &$newTaxEntries): void
    {
        $taxes = $line
            ->taxes()
            ->orderBy('sort')
            ->get();

        $existingTaxLines = MoveLine::where('move_id', $line->move->id)
            ->where('display_type', 'tax')
            ->get()
            ->keyBy('tax_line_id');

        foreach ($taxes as $tax) {
            $move = $line->move;

            $computedTax = collect($taxesComputed)->firstWhere('tax_id', $tax->id);

            $currentTaxAmount = $computedTax['tax_amount'];

            if (isset($newTaxEntries[$tax->id])) {
                $newTaxEntries[$tax->id]['debit'] += 0.00;
                $newTaxEntries[$tax->id]['credit'] += $currentTaxAmount;
                $newTaxEntries[$tax->id]['balance'] += $currentTaxAmount;
                $newTaxEntries[$tax->id]['amount_currency'] += $currentTaxAmount;
                $newTaxEntries[$tax->id]['tax_base_amount'] += $subTotal;
            } else {
                $newTaxEntries[$tax->id] = [
                    'name'                  => $tax->name,
                    'move_id'               => $move->id,
                    'move_name'             => $move->name,
                    'display_type'          => 'tax',
                    'currency_id'           => $move->currency_id,
                    'partner_id'            => $move->partner_id,
                    'company_id'            => $move->company_id,
                    'company_currency_id'   => $move->company_currency_id,
                    'commercial_partner_id' => $move->partner_id,
                    'sort'                  => MoveLine::max('sort') + 1,
                    'parent_state'          => $move->state,
                    'date'                  => now(),
                    'creator_id'            => $move->creator_id,
                    'debit'                 => 0.00,
                    'credit'                => $currentTaxAmount,
                    'balance'               => -$currentTaxAmount,
                    'amount_currency'       => -$currentTaxAmount,
                    'tax_base_amount'       => $subTotal,
                    'tax_line_id'           => $tax->id,
                    'tax_group_id'          => $tax->tax_group_id,
                ];
            }
        }

        foreach ($newTaxEntries as $taxId => $taxData) {
            if (isset($existingTaxLines[$taxId])) {
                $existingTaxLines[$taxId]->update($taxData);

                unset($existingTaxLines[$taxId]);
            } else {
                $taxData['sort'] = MoveLine::max('sort') + 1;

                MoveLine::create($taxData);
            }
        }

        $existingTaxLines->each->delete();
    }
}
