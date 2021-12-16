<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProductDetailsSeeder extends Seeder
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
            ProductDetail::create([
                'product_id' => $i,
                'purchasing_price' => $faker->numberBetween($min = 1000, $max = 100000),
                'selling_price' => $faker->numberBetween($min = 1000, $max = 100000),
                'quantity' => $faker->numberBetween($min = 0, $max = 250),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);    
        }
    }
}
