<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('departments')->insert([

            [
                'dept_name'   => 'Computer Science and Engineering',
                'status' => '1',
            ],
            [
                'dept_name'   => 'Mathematics',
                'status' => '1',

            ],
            [
                'dept_name'   => 'Physics',
                'status' => '1',

            ],
            [
                'dept_name'   => 'Bangla',
                'status' => '1',

            ],
            [
                'dept_name'   => 'English',
                'status' => '1',

            ],

        ]);
    }
}
