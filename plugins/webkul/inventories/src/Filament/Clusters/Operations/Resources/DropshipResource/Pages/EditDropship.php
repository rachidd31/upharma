<?php

namespace Webkul\Inventory\Filament\Clusters\Operations\Resources\DropshipResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Webkul\Chatter\Filament\Actions\ChatterAction;
use Webkul\Inventory\Enums;
use Webkul\Inventory\Filament\Clusters\Operations\Actions as OperationActions;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\DropshipResource;

class EditDropship extends EditRecord
{
    protected static string $resource = DropshipResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }

    protected function getSavedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title(__('inventories::filament/clusters/operations/resources/dropship/pages/edit-dropship.notification.title'))
            ->body(__('inventories::filament/clusters/operations/resources/dropship/pages/edit-dropship.notification.body'));
    }

    protected function getHeaderActions(): array
    {
        return [
            ChatterAction::make()
                ->setResource(static::$resource),
            OperationActions\TodoAction::make(),
            OperationActions\ValidateAction::make(),
            OperationActions\CancelAction::make(),
            OperationActions\ReturnAction::make(),
            Actions\ActionGroup::make([
                OperationActions\Print\PickingOperationAction::make(),
                OperationActions\Print\DeliverySlipAction::make(),
                OperationActions\Print\PackageAction::make(),
                OperationActions\Print\LabelsAction::make(),
            ])
                ->label(__('inventories::filament/clusters/operations/resources/dropship/pages/edit-dropship.header-actions.print.label'))
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->button(),
            Actions\DeleteAction::make()
                ->hidden(fn () => $this->getRecord()->state == Enums\OperationState::DONE)
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title(__('inventories::filament/clusters/operations/resources/dropship/pages/edit-dropship.header-actions.delete.notification.title'))
                        ->body(__('inventories::filament/clusters/operations/resources/dropship/pages/edit-dropship.header-actions.delete.notification.body')),
                ),
        ];
    }

    public function updateForm(): void
    {
        $this->fillForm();
    }
}
