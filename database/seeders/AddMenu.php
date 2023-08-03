<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert(
            [
                //1
                [
                    'title' => 'Users',
                    'path' => 'users.index',
                    'parent' => 0,
                    'type' => 'admin',
                    'sort_order' => 100,
                ],
            ]
        );
    }
}
