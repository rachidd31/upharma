<?php

namespace Webkul\Purchase;

use Livewire\Livewire;
use Webkul\Purchase\Livewire\Summary;
use Webkul\Support\Console\Commands\InstallCommand;
use Webkul\Support\Console\Commands\UninstallCommand;
use Webkul\Support\Package;
use Webkul\Support\PackageServiceProvider;

class PurchaseServiceProvider extends PackageServiceProvider
{
    public static string $name = 'purchases';

    public static string $viewNamespace = 'purchases';

    public function configureCustomPackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews()
            ->hasRoute('web')
            ->hasTranslations()
            ->hasMigrations([
                '2025_02_11_101100_create_purchases_order_groups_table',
                '2025_02_11_101101_create_purchases_requisitions_table',
                '2025_02_11_101105_create_purchases_requisition_lines_table',
                '2025_02_11_101110_create_purchases_orders_table',
                '2025_02_11_101118_create_purchases_order_lines_table',
                '2025_02_11_135617_create_purchases_order_line_taxes_table',
                '2025_02_11_142937_create_purchases_order_account_moves_table',
                '2025_02_11_143351_alter_accounts_account_move_lines_table',
            ])
            ->runsMigrations()
            ->hasSettings([
                '2025_01_11_094022_create_purchases_order_settings',
                '2025_01_11_094022_create_purchases_product_settings',
            ])
            ->runsSettings()
            ->hasDependencies([
                'invoices',
            ])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->installDependencies()
                    ->runsMigrations();
            })
            ->hasUninstallCommand(function (UninstallCommand $command) {});
    }

    public function packageBooted(): void
    {
        Livewire::component('order-summary', Summary::class);

        Livewire::component('list-products', \Webkul\Purchase\Livewire\Customer\ListProducts::class);
    }
}
