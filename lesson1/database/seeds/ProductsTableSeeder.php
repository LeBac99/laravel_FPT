<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
        $products = [];
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 
        	$item = [
        		'name' => $faker->name,
        		'image' => 'images/'. $faker->image($dir = 'public/images', $width = 640, $height = 480, 'people', false),
        		'detail' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        		'price' => rand(1, 100),
        		'amount' => rand(1,100),
        		'status' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
        	];
        	$products[] = $item;
        }
        DB::table('products')->insert($products);
    }
}
