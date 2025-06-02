<?php

namespace Webkul\Account\Filament\Resources\TaxResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\EditRecord;
use Webkul\Account\Filament\Resources\TaxResource;

class EditTax extends EditRecord
{
    protected static string $resource = TaxResource::class;

    public function getSubNavigationPosition(): SubNavigationPosition
    {
        return SubNavigationPosition::Top;
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title(__('accounts::filament/resources/tax/pages/edit-tax.notification.title'))
            ->body(__('accounts::filament/resources/tax/pages/edit-tax.notification.body'));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title(__('accounts::filament/resources/tax/pages/edit-tax.header-actions.delete.notification.title'))
                        ->body(__('accounts::filament/resources/tax/pages/edit-tax.header-actions.delete.notification.body'))
                ),
        ];
    }
}
