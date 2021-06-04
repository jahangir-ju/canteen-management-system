<?php

use Illuminate\Database\Seeder;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            'admin_id'    => '101',
            'admin_name'  => 'happy',
            'admin_email' => 'happy@gmail.com',
            'gender'      => 'Male',
            'password'    => '12345678',
            'admin_phone' => '01953282444',
            'status'      => '1',

        ]);
    }
}
