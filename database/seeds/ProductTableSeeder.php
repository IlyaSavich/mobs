<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
            DB::table('product')->insert([
                'title' => $faker->jobTitle . '_' . $index,
                'description' => $faker->text,
                'price' => $faker->numberBetween(0, 1500),
                'quantity' => $faker->numberBetween(0, 100),
                'created_at' => $faker->dateTimeBetween(),
                'updated_at' => $faker->dateTimeBetween(),
            ]);
        }
    }
}
