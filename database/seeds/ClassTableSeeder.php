<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('classes')->delete();

        $input = array(
            array(
                'id' => 1,
                'school_id' => 501112,
                'name' => '1A',
                'sumstudents' => '30'
            )
        );

        \DB::table('classes')->insert($input);
    }
}
