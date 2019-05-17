<?php

use Illuminate\Database\Seeder;

class FollowingTableSeeder extends Seeder
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
            DB::table('followers')->insert([ 
                'user_id' => 1,
                'store_id' => $i,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
                'deleted_at' => NULL,
            ]);
        }
    }
}
