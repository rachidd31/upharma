<?php

namespace Webkul\Inventory\Filament\Clusters\Products\Resources\PackageResource\Pages;

use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Webkul\Inventory\Filament\Clusters\Products\Resources\PackageResource;
use Webkul\Inventory\Models\Package;

class ViewPackage extends ViewRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ActionGroup::make([
                Actions\Action::make('print-without-content')
                    ->label(__('inventories::filament/clusters/products/resources/package/pages/view-package.header-actions.print.actions.without-content.label'))
                    ->color('gray')
                    ->action(function (Package $record) {
                        $pdf = PDF::loadView('inventories::filament.clusters.products.packages.actions.print-without-content', [
                            'records' => collect([$record]),
                        ]);

                        $pdf->setPaper('a4', 'portrait');

                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, 'Package-'.$record->name.'.pdf');
                    }),
                Actions\Action::make('print-with-content')
                    ->label(__('inventories::filament/clusters/products/resources/package/pages/view-package.header-actions.print.actions.with-content.label'))
                    ->color('gray')
                    ->action(function (Package $record) {
                        $pdf = PDF::loadView('inventories::filament.clusters.products.packages.actions.print-with-content', [
                            'records' => collect([$record]),
                        ]);

                        $pdf->setPaper('a4', 'portrait');

                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, 'Package-'.$record->name.'.pdf');
                    }),
            ])
                ->label(__('inventories::filament/clusters/products/resources/package/pages/view-package.header-actions.print.label'))
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->button(),
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title(__('inventories::filament/clusters/products/resources/package/pages/view-package.header-actions.delete.notification.title'))
                        ->body(__('inventories::filament/clusters/products/resources/package/pages/view-package.header-actions.delete.notification.body')),
                ),
        ];
    }
}
