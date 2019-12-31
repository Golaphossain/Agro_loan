<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'=>'1',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('rootadmin'),
        ]);
    }
}
