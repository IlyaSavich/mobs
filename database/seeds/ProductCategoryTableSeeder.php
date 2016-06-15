<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 100) as $index) {
            DB::table('product_category')->insert([
                'product_id' => $index,
                'category_id' => $faker->numberBetween(1, 30),
                'created_at' => $faker->dateTimeBetween(),
                'updated_at' => $faker->dateTimeBetween(),
            ]);
        }
    }
}
