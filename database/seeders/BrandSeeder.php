<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,10) as $index) {
            $name = substr($faker->unique()->name,0,10);
            Brand::create([
                'name' => $name,
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
