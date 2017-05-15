<?php

use Illuminate\Database\Seeder;

class ElementaryOfferCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('elementary_offer_cities')->delete();

        $cities = array(
            array(
                'name' => 'Hinterglemm'
            ),
            array(
                'name' => 'Flachau'
            ),
            array(
                'name' => 'Obertauern'
            ),
            array(
                'name' => 'Annaberg'
            ),
            array(
                'name' => 'Russbach'
            ),
            array(
                'name' => 'Dürnberg'
            ),
            array(
                'name' => 'Gosau'
            ),
            array(
                'name' => 'Hinterstoder'
            ),
            array(
                'name' => 'Wurzeralm'
            ),
            array(
                'name' => 'Präbichl'
            ),
            array(
                'name' => 'Obdach'
            ),
            array(
                'name' => 'Stuhleck'
            ),
            array(
                'name' => 'Hauser Kaibling'
            ),
            array(
                'name' => 'Kreischberg'
            ),
            array(
                'name' => 'Gerlitze'
            ),
            array(
                'name' => 'Petzen'
            ),
            array(
                'name' => 'Bad Kleinkirchheim'
            ),
            array(
                'name' => 'Nassfeld'
            )

        );

        \DB::table('elementary_offer_cities')->insert($cities);
    }
}
