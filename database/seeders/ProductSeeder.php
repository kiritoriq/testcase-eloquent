<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=1; $i <= 100; $i++) {
            Product::create([
                'category_id' => $faker->numberBetween(1,100),
                // 'product_name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'product_name' => $faker->words($nb = 3, $asText = true),
                'product_description' => $faker->text($maxNbChars = 60),
                'product_image' => $faker->word.'.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);    
        }
    }
}
