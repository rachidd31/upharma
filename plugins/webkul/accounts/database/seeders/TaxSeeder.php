<?php

namespace Webkul\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Account\Enums\TypeTaxUse;

class TaxSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('accounts_taxes')->delete();

        $invoicesTaxes = [
            [
                'company_id'                       => 1,
                'sort'                             => 1,
                'tax_group_id'                     => 1,
                'cash_basis_transition_account_id' => null,
                'country_id'                       => 233,
                'creator_id'                       => 1,
                'type_tax_use'                     => TypeTaxUse::SALE->value,
                'tax_scope'                        => null,
                'amount_type'                      => 'percent',
                'price_include_override'           => null,
                'tax_exigibility'                  => 'on_invoice',
                'name'                             => '15 %',
                'description'                      => '<p>CESS 5%</p>',
                'invoice_label'                    => 'Tax 15 %',
                'invoice_legal_notes'              => null,
                'amount'                           => 15,
                'is_active'                        => true,
                'include_base_amount'              => true,
                'is_base_affected'                 => false,
                'analytic'                         => null,
                'created_at'                       => now(),
                'updated_at'                       => now(),
                'formula'                          => 'price_unit * 0.10',
            ],
            [
                'company_id'                       => 1,
                'sort'                             => 1,
                'tax_group_id'                     => 1,
                'cash_basis_transition_account_id' => null,
                'country_id'                       => 233,
                'creator_id'                       => 1,
                'type_tax_use'                     => TypeTaxUse::PURCHASE->value,
                'tax_scope'                        => null,
                'amount_type'                      => 'percent',
                'price_include_override'           => null,
                'tax_exigibility'                  => 'on_invoice',
                'name'                             => '15 %',
                'description'                      => null,
                'invoice_label'                    => 'Tax 15 %',
                'invoice_legal_notes'              => null,
                'amount'                           => 15,
                'is_active'                        => true,
                'include_base_amount'              => true,
                'is_base_affected'                 => false,
                'analytic'                         => null,
                'created_at'                       => now(),
                'updated_at'                       => now(),
                'formula'                          => 'price_unit * 0.10',
            ],
        ];

        DB::table('accounts_taxes')->insert($invoicesTaxes);
    }
}
