<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Command: composer dump --> if there are problems with seeding
        $this->call(UsersTableSeeder::class);
        $this->call(ElementaryOfferPackagesTableSeeder::class);
        $this->call(ElementaryOfferCountriesTableSeeder::class);
        $this->call(ElementaryOfferCitiesTableSeeder::class);
        $this->call(ElementaryOfferCitiesCountriesTableSeeder::class);

        $this->call(SchoolSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(TeacherTableSeeder::class);

        $this->call(ElementaryWishesTableSeeder::class);
    }
}
