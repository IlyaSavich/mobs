<?php

use Carbon\Carbon;
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
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => bcrypt('testtest'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role' => 1,
        ]);
    }
}
