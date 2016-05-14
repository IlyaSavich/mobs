<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 30) as $index) {
            DB::table('category')->insert([
                'title' => $faker->jobTitle . '_' . $index,
                'description' => $faker->text,
                'parent_id' => $faker->numberBetween(1, 30),
                'created_at' => $faker->dateTimeBetween(),
                'updated_at' => $faker->dateTimeBetween(),
            ]);
        }
    }
}
