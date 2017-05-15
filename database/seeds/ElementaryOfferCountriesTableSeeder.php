<?php

use Illuminate\Database\Seeder;

class ElementaryOfferCountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('elementary_offer_countries')->delete();

        $countries = array(
            array(
                'name' => 'Salzburg'
            ),
            array(
                'name' => 'Oberösterreich'
            ),
            array(
                'name' => 'Steiermark'
            ),
            array(
                'name' => 'Kärnten'
            )
                   );

        \DB::table('elementary_offer_countries')->insert($countries);
    }
}
