<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $users = DB::table('users')->pluck('id')->all();
        foreach(range(1,10) as $index)
        {
        	DB::table('bands')->insert([
        		'user_id' => $faker->randomElement($users),
        		'name' => $faker->word . ' '. $faker->word,
        		'start_date' => $faker->date,
        		'website' => $faker->url,
        		'still_active' => $faker->boolean
        	]);
        }
    }
}
