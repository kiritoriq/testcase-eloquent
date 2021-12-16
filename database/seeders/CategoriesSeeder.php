<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 100; $i++) {
            Category::create([
                'category_name' => $faker->words($nb = 2, $asText = true),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
