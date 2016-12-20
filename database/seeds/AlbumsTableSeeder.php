<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $genres = ['Hip Hop','Pop','Rock','Salsa','Soul','Country','Jazz'];
        $labels = ['Epic','Sony','Concord','Repulic','Bethel Music','Droog Records','Sugar Music'];
        $bands = DB::table('bands')->pluck('id')->all();
        foreach(range(1,100) as $index)
        {
            DB::table('albums')->insert([
                'band_id' => $faker->randomElement($bands),
                'name' => $faker->word . ' '. $faker->word . ' ' . $faker->word,
                'recorded_date' => $faker->date,
                'number_of_tracks' => $faker->randomElement([6,7,8,9,10,11,12,13,14,15]),
                'label' => $faker->randomElement($labels),
                'producer' => $faker->name,
                'genre' => $faker->randomElement($genres)
            ]);
        }
    }
}
