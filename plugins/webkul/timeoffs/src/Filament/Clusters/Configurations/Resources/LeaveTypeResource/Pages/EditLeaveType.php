<?php

namespace Webkul\TimeOff\Filament\Clusters\Configurations\Resources\LeaveTypeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Webkul\TimeOff\Filament\Clusters\Configurations\Resources\LeaveTypeResource;
use Webkul\TimeOff\Models\LeaveType;

class EditLeaveType extends EditRecord
{
    protected static string $resource = LeaveTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }

    protected function getSavedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title(__('time_off::filament/clusters/configurations/resources/leave-type/pages/edit-leave-type.notification.title'))
            ->body(__('time_off::filament/clusters/configurations/resources/leave-type/pages/edit-leave-type.notification.body'));
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title(__('time_off::filament/clusters/configurations/resources/leave-type/pages/edit-leave-type.header-actions.delete.notification.title'))
                        ->body(__('time_off::filament/clusters/configurations/resources/leave-type/pages/edit-leave-type.header-actions.delete.notification.body'))
                ),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = Auth::user();

        $data['company_id'] = $user->default_company_id;

        $data['creator_id'] = $user?->id;

        $data['sort'] = LeaveType::max('sort') + 1;

        return $data;
    }
}
