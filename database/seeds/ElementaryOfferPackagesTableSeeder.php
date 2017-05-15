<?php

use Illuminate\Database\Seeder;

class ElementaryOfferPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('elementary_offer_packages')->delete();

        $packages = array(
            array(
                'name' => 'Schnuppertag'
            ),
            array(
                'name' => 'Cassic'
            ),
            array(
                'name' => 'Individuell'
            )
        );

        \DB::table('elementary_offer_packages')->insert($packages);
    }
}
