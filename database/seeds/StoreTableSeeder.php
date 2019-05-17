<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 30;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('stores')->insert([ 
                'name' => $faker->name,
                'address' => $faker->address,
                'longitude' => NULL,
                'latitude' => NULL,
                'user_id' => 1,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
                'deleted_at' => NULL,
            ]);
        }
    }
}
