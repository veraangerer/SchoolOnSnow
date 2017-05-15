<?php

use Illuminate\Database\Seeder;

class ElementaryWishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('elementary_wishes')->delete();

        $input = array(
            array(
                'id' => 23452689,
                'user_id' => 1,
                'class_id' => 1,
                'cities_countries_id' => 1,
                'primaryDateStart' => '01.11.2016',
                'primaryDateEnd' => '01.11.2016',
                'secondaryDateStart' => '01.12.2016',
                'secondaryDateEnd' => '01.12.2016',
                'package_id' => 1,
                'user_id' => 1
            )
        );

        \DB::table('elementary_wishes')->insert($input);
    }
}
