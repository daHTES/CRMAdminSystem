<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('users')->insert([
            'firstname' => 'Root',
            'lastname' => 'admin',
            'phone' => '12344',
            'email' => 'root@ukr.net',
            'password' => bcrypt('12345'),
            'status' => 1
        ]);

    }
}
