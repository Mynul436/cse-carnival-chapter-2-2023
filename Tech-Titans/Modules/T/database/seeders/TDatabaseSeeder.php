<?php

namespace Modules\T\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\T;

class TDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * TS Seed
         * ------------------
         */

        // DB::table('ts')->truncate();
        // echo "Truncate: ts \n";

        T::factory()->count(20)->create();
        $rows = T::all();
        echo " Insert: ts \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
