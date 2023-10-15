<?php

namespace Modules\Chat\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Chat;

class ChatDatabaseSeeder extends Seeder
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
         * Chats Seed
         * ------------------
         */

        // DB::table('chats')->truncate();
        // echo "Truncate: chats \n";

        Chat::factory()->count(20)->create();
        $rows = Chat::all();
        echo " Insert: chats \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
