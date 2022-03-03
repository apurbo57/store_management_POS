<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,5) as $index) {
            $name = substr($faker->unique()->name,0,15);
            Post::create([
                'name' => $name,
                'slug' => slugify($name),
                'category_id'       => rand(1,3),
                'brand_id'          => rand(1,3),
                'buing_price' => rand(111,999),
                'quantity'  => rand(1,99),
                'status' => $this->randStatus()
            ]);
        }
    }
    public function randStatus(){
        return array_rand(['active'=>'active', 'inactive'=>'inactive'],1);
    }
}
