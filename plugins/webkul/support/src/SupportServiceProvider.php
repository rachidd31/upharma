<?php

namespace Webkul\Support;

use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Webkul\Security\Livewire\AcceptInvitation;
use Webkul\Security\Policies\RolePolicy;
use Webkul\Support\Console\Commands\InstallERP;

class SupportServiceProvider extends PackageServiceProvider
{
    public static string $name = 'support';

    public static string $viewNamespace = 'support';

    public function configureCustomPackage(Package $package): void
    {
        $package->name(static::$name)
            ->isCore()
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations([
                '2024_11_05_105102_create_plugins_table',
                '2024_11_05_105112_create_plugin_dependencies_table',
                '2024_12_06_061927_create_currencies_table',
                '2024_12_10_092651_create_countries_table',
                '2024_12_10_092657_create_states_table',
                '2024_12_10_092657_create_companies_table',
                '2024_12_10_100944_create_user_allowed_companies_table',
                '2024_12_10_101420_create_banks_table',
                '2024_12_10_092658_create_company_addresses_table',
                '2024_12_12_114620_create_activity_plans_table',
                '2024_12_12_115256_create_activity_types_table',
                '2024_12_12_115728_create_activity_plan_templates_table',
                '2024_12_17_082318_create_activity_type_suggestions_table',
                '2024_12_23_103137_create_activity_logs_table',
                '2025_01_03_061444_create_email_templates_table',
                '2025_01_03_061445_create_email_logs_table',
                '2025_01_03_105625_create_unit_of_measure_categories_table',
                '2025_01_03_105627_create_unit_of_measures_table',
                '2025_01_07_131336_add_partner_address_id_column_company_addresses_table',
                '2025_01_07_125015_add_partner_id_to_companies_table',
                '2025_01_09_111545_create_utm_mediums_table',
                '2025_01_09_114324_create_utm_sources_table',
                '2025_02_07_094256_create_utm_stages_table',
                '2025_02_07_094325_create_utm_campaigns_table',
            ])
            ->runsMigrations()
            ->hasCommands([
                InstallERP::class,
            ]);
    }

    public function packageBooted(): void
    {
        Livewire::component('accept-invitation', AcceptInvitation::class);

        Gate::policy(Role::class, RolePolicy::class);
    }

    public function packageRegistered(): void
    {
        //
    }
}
