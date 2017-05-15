<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        $users = array(
            array(
                'name' => 'Teacher',
                'email' => 'teacher@gmx.at',
                'password' => Hash::make('123456'),
                'role' => 2
            ),
            array(
                'name' => 'Admin',
                'email' => 'admin@gmx.at',
                'password' => Hash::make('123456'),
                'role' => 1
            )
        );

        \DB::table('users')->insert($users);
    }
}
