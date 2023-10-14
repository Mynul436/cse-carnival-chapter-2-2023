<?php

namespace Modules\BookAppointment\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\BookAppointment;

class BookAppointmentDatabaseSeeder extends Seeder
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
         * BookAppointments Seed
         * ------------------
         */

        // DB::table('bookappointments')->truncate();
        // echo "Truncate: bookappointments \n";

        BookAppointment::factory()->count(20)->create();
        $rows = BookAppointment::all();
        echo " Insert: bookappointments \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
