<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 0,
            'fname' => 'root',
            'mname' => 'root',
            'lname' => 'root',
            'fname' => 'root',
            'email' => 'root@gmail.com',
            'password' => Hash::make('secret'),
            'hNo'=> '00',
            'add1' => 'root',
            'add2' => 'root',
            'town' => 'root',
            'tel' => '0000000000',
            'role_id' => 4,
            'branch_id'=> 1,
        ]);
        DB::table('role')->insert([
            'id' => 1,
            'role' =>'Pharmacist'
        ]);
        DB::table('role')->insert([
            'id' => 2,
            'role' =>'Cashier'
        ]);
        DB::table('role')->insert([
            'id' => 3,
            'role' =>'Customer'
        ]);
        DB::table('role')->insert([
            'id' => 4,
            'role' =>'root'
        ]);
    }
}
