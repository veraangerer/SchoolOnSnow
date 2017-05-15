<?php

use Illuminate\Database\Seeder;

class ElementaryOfferCitiesCountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('elementary_offer_cities_countries')->delete();

        $citiescountries = array(
            array(
                'countries_id' => 1,
                'cities_id' => 1,
            ),
            array(
                'countries_id' => 1,
                'cities_id' => 2,
            ),
            array(
                'countries_id' => 1,
                'cities_id' => 3,
            ),
            array(
                'countries_id' => 1,
                'cities_id' => 4,
            ),
            array(
                'countries_id' => 1,
                'cities_id' => 5,
            ),
            array(
                'countries_id' => 1,
                'cities_id' => 6,
            ),
            array(
                'countries_id' => 1,
                'cities_id' => 7,
            ),
            array(
                'countries_id' => 2,
                'cities_id' => 8,
            ),
            array(
                'countries_id' => 2,
                'cities_id' => 9,
            ),
            array(
                'countries_id' => 3,
                'cities_id' => 10,
            ),
            array(
                'countries_id' => 3,
                'cities_id' => 11,
            ),
            array(
                'countries_id' => 3,
                'cities_id' => 12,
            ),
            array(
                'countries_id' => 3,
                'cities_id' => 13,
            ),
            array(
                'countries_id' => 3,
                'cities_id' => 14,
            ),
            array(
                'countries_id' => 4,
                'cities_id' => 15,
            ),
            array(
                'countries_id' => 4,
                'cities_id' => 16,
            ),
            array(
                'countries_id' => 4,
                'cities_id' => 17,
            ),
            array(
                'countries_id' => 4,
                'cities_id' => 18,
            )
        );

        \DB::table('elementary_offer_cities_countries')->insert($citiescountries);
    }
}
