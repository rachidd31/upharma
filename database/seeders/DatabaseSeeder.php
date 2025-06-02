<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Webkul\Security\Database\Seeders\DatabaseSeeder as SecurityDatabaseSeeder;
use Webkul\Support\Database\Seeders\DatabaseSeeder as SupportDatabaseSeeder;
// Potentially add your other app-specific seeders here if needed
// use App\Database\Seeders\YourAppSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            SecurityDatabaseSeeder::class,
            SupportDatabaseSeeder::class,
            // If you have other application-specific seeders that should run
            // after the package seeders, you can add them here.
            // For example:
            // UserSeeder::class, // Assuming you have a UserSeeder in Database\Seeders
            // ProductSeeder::class,
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}