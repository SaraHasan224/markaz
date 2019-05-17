<?php

use Illuminate\Database\Seeder;

class PromotionTableCategoriesSeeder extends Seeder
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
            DB::table('promotion_categories')->insert([ 
                'title' => $faker->title,
                'status' => 1,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
                'deleted_at' => NULL,
            ]);
        }
    }
}
