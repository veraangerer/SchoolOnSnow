<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('schools')->delete();

        $schools = array(
            array(
                'idNumber' => 501112,
                'name' => 'Neue Mittelschule Taxham',
                'address' => 'Franz-Linher-Strasse 4',
                'postcode' => '5020',
                'city' => 'Salzburg',
                'country' => 'Österreich',
                'firstName' => 'DirektionVorname',
                'lastName' => 'DirektionNachname',
                'telephone' => '0662/434618',
                'email' => 'direktion@hs-taxham.schulen-salzburg.at'

            )
        );

        \DB::table('schools')->insert($schools);
    }
}
