<?php

namespace Webkul\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Security\Models\User; // Assuming this is the correct User model namespace
use Webkul\Support\Models\Country;
use Webkul\Support\Models\Currency;
use Webkul\Support\Models\State;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('companies')->delete();
        DB::table('partners_partners')->delete();
        DB::table('company_addresses')->delete();
        // If 'accounts_journals' should also be cleared when companies are seeded,
        // and it's not handled by another seeder that runs before this,
        // you might consider adding:
        // DB::table('accounts_journals')->delete();
        // However, this depends on your application's seeding logic.
        // The error specifically mentioned `accounts_journals` having a foreign key to `companies`.

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // It's generally safer to re-enable checks *before* inserts,
        // but if inserts themselves might temporarily violate constraints
        // that are resolved by the end of the seeder, you might move
        // SET FOREIGN_KEY_CHECKS=1; to the very end.
        // For this specific error (delete failing), enabling after deletes is correct.

        $currencyId = null;
        $currency = Currency::find(1);
        if ($currency) {
            $currencyId = $currency->id;
        } else {
            // Handle case where currency with ID 1 is not found,
            // perhaps by creating it or using a default.
            // For now, we'll let it be null and assume your DB allows null
            // or you have a default currency seeder that runs first.
            // Or, throw an exception if it's critical:
            // throw new \Exception("Currency with ID 1 not found.");
        }


        $countryId = null;
        $country = Country::find(233);
        if ($country) {
            $countryId = $country->id;
        } else {
            // Handle case where country with ID 233 is not found
        }

        $stateId = null;
        $state = State::find(13);
        if ($state) {
            $stateId = $state->id;
        } else {
            // Handle case where state with ID 13 is not found
        }
        
        $user = User::first(); // Ensure a user exists or handle null case for creator_id

        $now = now();

        $companyId = DB::table('companies')->insertGetId([
            'sort'                  => 1,
            'name'                  => 'DummyCorp LLC',
            'tax_id'                => 'DUM123456',
            'registration_number'   => 'DUMREG789',
            'company_id'            => 'DUMCOMP001', // This seems like a self-reference or an external ID. Ensure it's intended.
            'creator_id'            => $user?->id,
            'email'                 => 'dummy@dummycorp.local',
            'phone'                 => '1234567890',
            'mobile'                => '1234567890',
            'color'                 => '#AAAAAA',
            'is_active'             => true,
            'founded_date'          => '2000-01-01',
            'currency_id'           => $currencyId,
            'website'               => 'http://dummycorp.local',
            'created_at'            => $now,
            'updated_at'            => $now,
        ]);

        $partnerId = DB::table('partners_partners')->insertGetId([
            'sub_type'              => 'company',
            'company_registry'      => 'DUMREG780',
            'name'                  => 'DummyCorp LLC',
            'email'                 => 'dummy@dummycorp.local',
            'website'               => 'http://dummycorp.local',
            'tax_id'                => 'DUM123456',
            'phone'                 => '1234567890',
            'mobile'                => '1234567890',
            'creator_id'            => $user?->id,
            'color'                 => '#AAAAAA',
            'company_id'            => $companyId, // This links the partner to the company created above
            'created_at'            => $now,
            'updated_at'            => $now,
        ]);

        $partnerPermanentAddressId = DB::table('partners_addresses')->insertGetId([
            'partner_id'    => $partnerId,
            'street1'       => '123 Placeholder Ave',
            'city'          => 'Ave', // City might need to be more specific
            'name'          => 'DummyCorp LLC', // Address name, often contact person or location type
            'type'          => 'permanent',
            'state_id'      => $stateId,
            'country_id'    => Country::inRandomOrder()->first()?->id, // Ensure a country exists
            'zip'           => '000000',
            'creator_id'    => $user?->id,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('partners_addresses')->insertGetId([ // Not capturing ID, assuming it's not needed later
            'partner_id'    => $partnerId,
            'street1'       => '456 California Blvd',
            'city'          => 'Los Angeles',
            'name'          => 'DummyCorp LLC',
            'type'          => 'present',
            'creator_id'    => $user?->id,
            'state_id'      => $stateId,
            'country_id'    => $countryId,
            'zip'           => '000000', // Consider a more realistic ZIP for Los Angeles if needed
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('company_addresses')->insert([
            'partner_address_id'    => $partnerPermanentAddressId,
            'company_id'            => $companyId,
            'street1'               => '456 California Blvd', // This is different from the permanent partner address street1
            'city'                  => 'Los Angeles',
            'state_id'              => $stateId,
            'country_id'            => $countryId,
            'zip'                   => '90001',
            'is_primary'            => true,
            'created_at'            => $now,
            'updated_at'            => $now,
        ]);
    }
}
