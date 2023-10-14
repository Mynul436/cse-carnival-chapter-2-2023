<?php

namespace Modules\DoctorsBlog\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\DoctorsBlog;

class DoctorsBlogDatabaseSeeder extends Seeder
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
         * DoctorsBlogs Seed
         * ------------------
         */

        // DB::table('doctorsblogs')->truncate();
        // echo "Truncate: doctorsblogs \n";

        DoctorsBlog::factory()->count(20)->create();
        $rows = DoctorsBlog::all();
        echo " Insert: doctorsblogs \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
