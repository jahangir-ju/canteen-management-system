<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_categories')->insert([

            [
                'name'   => 'BreakFast',
                'status' => '1',
            ],
            [
                'name'   => 'Lunch',
                'status' => '1',

            ],
            [
                'name'   => 'Dinner',
                'status' => '1',

            ],
            [
                'name'   => 'Snacks',
                'status' => '1',

            ],
            [
                'name'   => 'Drinks',
                'status' => '1',

            ],
            [
                'name'   => 'Educational Equipment',
                'status' => '1',

            ],

        ]);
    }
}
