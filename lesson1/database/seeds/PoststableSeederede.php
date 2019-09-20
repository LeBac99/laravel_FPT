<?php

use Illuminate\Database\Seeder;

class PoststableSeederede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [];
        $faker = Faker\Factory::create();
        for ($i=0; $i < 50; $i++) { 
        	$item = [
        		'title' => $faker->name,
        		'image' => 'images/'. $faker->image($dir = 'public/images', $width = 640, $height = 480, 'people', false),
        		'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        		'author_id' => rand(1, 10),
        		'publish_date' => $faker->dateTime($max = 'now', $timezone = null),
        		'status' => rand(0, 1),
                 'created_at' => now(),
                'updated_at' => now(),
        	];
        	$posts[] = $item;
        }
        DB::table('posts')->insert($posts);
    }
}
