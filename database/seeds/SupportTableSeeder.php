<?php

use Illuminate\Database\Seeder;

class SupportTableSeeder extends Seeder
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
            DB::table('support')->insert([ 
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'store_id' => $i+1,
                'subject' => $faker->text,
                'email' => $faker->email,
                'response' => $faker->text,
                'description' => $faker->text,
                'status' => 1, 
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
                'deleted_at' => NULL,
            ]);
        }
    }
}
