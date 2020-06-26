<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	for($i = 0;$i < 10;$i++){
    		DB::table('products')->insert([
    			'name'=>$faker->name,
    			'image'=>"public/aothun.jpeg",
    			'category_id'=>1,
    			'description'=>$faker->sentence(20),
    			'price'=>100000,
    			'oldPrice'=>140000,
    			'quantity'=>100,
    			'status'=>$faker->sentence(10),
    		]);
    	}
    }
}
