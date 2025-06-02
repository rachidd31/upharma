<?php

namespace Webkul\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Security\Models\User;

class UtmStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Line 16 where the error occurs
        DB::table('utm_stages')->delete();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = now();

        $user = User::first();

        $utmStages = [
            [
                'sort'       => 1,
                'name'       => 'New',
                'created_by' => $user?->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'sort'       => 2,
                'name'       => 'Schedule',
                'created_by' => $user?->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'sort'       => 3,
                'name'       => 'Design',
                'created_by' => $user?->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'sort'       => 3,
                'name'       => 'Sent',
                'created_by' => $user?->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('utm_stages')->insert($utmStages);
    }
}
