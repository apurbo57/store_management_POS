<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,20) as $index) {
            $name = substr($faker->unique()->name,0,15);
            Category::create([
                'name' => $name,
                'root' => rand(0,3),
                'slug' => slugify($name),
                'status' => $this->randStatus(),
                'create_by' => rand(1,11),
            ]);
        }
    }
    public function randStatus(){
        return array_rand(['active'=>'active', 'inactive'=>'inactive'],1);
    }
}
