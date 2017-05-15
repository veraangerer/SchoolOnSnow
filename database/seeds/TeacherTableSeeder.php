<?php

use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teachers')->delete();

        $input = array(
            array(
                'id' => 1,
                'school_id' => 501112,
                'firstName' => 'Erika',
                'lastName' => 'Mustermann',
                'telephone' => '0664/1234567',
                'email' => 'erika@school.at',
                'isContact' => 1,
                'isSub' => 0
            ),
            array(
                'id' => 2,
                'school_id' => 501112,
                'firstName' => 'Max',
                'lastName' => 'Mustermann',
                'telephone' => '0664/1234568',
                'email' => 'max@school.at',
                'isContact' => 0,
                'isSub' => 1
            )
        );

        \DB::table('teachers')->insert($input);

    }
}
