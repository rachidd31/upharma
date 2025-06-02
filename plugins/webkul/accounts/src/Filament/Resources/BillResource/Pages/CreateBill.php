<?php

namespace Webkul\Account\Filament\Resources\BillResource\Pages;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Webkul\Account\Enums;
use Webkul\Account\Enums\PaymentState;
use Webkul\Account\Filament\Resources\BillResource;
use Webkul\Account\Models\Move;
use Webkul\Account\Models\Partner;

class CreateBill extends CreateRecord
{
    protected static string $resource = BillResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title(__('accounts::filament/resources/bill/pages/create-bill.notification.title'))
            ->body(__('accounts::filament/resources/bill/pages/create-bill.notification.body'));
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = Auth::user();

        $data['creator_id'] = $user->id;
        $data['state'] ??= Enums\MoveState::DRAFT->value;
        $data['move_type'] ??= Enums\MoveType::IN_INVOICE->value;
        $data['date'] = now();
        $data['sort'] = Move::max('sort') + 1;
        $data['payment_state'] = PaymentState::NOT_PAID->value;

        if ($data['partner_id']) {
            $partner = Partner::find($data['partner_id']);
            $data['commercial_partner_id'] = $partner->id;
            $data['partner_shipping_id'] = $partner->addresses->where('type', 'present')->first()?->id;
            $data['invoice_partner_display_name'] = $partner->name;
        } else {
            $data['invoice_partner_display_name'] = "#Created By: {$user->name}";
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $this->getResource()::collectTotals($this->getRecord());
    }
}
