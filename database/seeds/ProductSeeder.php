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
    	
        DB::table('products')->insert([
            'name'=> "Áo khoác",
            'image'=>"public/aokhoac.jpeg",
            'category_id'=>1,
            'description'=>$faker->sentence(20),
            'price'=>300000,
            'oldPrice'=>340000,
            'quantity'=>100,
            'status'=>$faker->sentence(10),
        ]);
        DB::table('products')->insert([
            'name'=> "Áo sơ mi",
            'image'=>"public/smi.jpeg",
            'category_id'=>1,
            'description'=>$faker->sentence(20),
            'price'=>170000,
            'oldPrice'=>190000,
            'quantity'=>400,
            'status'=>$faker->sentence(10),
        ]);
        for($i = 0;$i < 6;$i++){
            DB::table('products')->insert([
                'name'=> "Quần Jean",
                'image'=>"public/jeandui.jpeg",
                'category_id'=>3,
                'description'=>$faker->sentence(20),
                'price'=>190000,
                'oldPrice'=>290000,
                'quantity'=>400,
                'status'=>$faker->sentence(10),
            ]);
        }
        for($i = 0;$i < 5;$i++){
            DB::table('products')->insert([
                'name'=>$faker->name,
                'image'=>"public/12.jfif",
                'category_id'=>1,
                'description'=>$faker->sentence(20),
                'price'=>300000,
                'oldPrice'=>340000,
                'quantity'=>200,
                'status'=>$faker->sentence(10),
            ]);
        }
        for($i = 0;$i < 3;$i++){
            DB::table('products')->insert([
                'name'=>$faker->name,
                'image'=>"public/13.jfif",
                'category_id'=>1,
                'description'=>$faker->sentence(20),
                'price'=>300000,
                'oldPrice'=>390000,
                'quantity'=>200,
                'status'=>$faker->sentence(10),
            ]);
        }
        
        for($i = 0;$i < 3;$i++){
            DB::table('products')->insert([
                'name'=>$faker->name,
                'image'=>"public/aothun.jpeg",
                'category_id'=>1,
                'description'=>$faker->sentence(20),
                'price'=>300000,
                'oldPrice'=>340000,
                'quantity'=>200,
                'status'=>$faker->sentence(10),
            ]);
        }
        for($i = 0;$i < 3;$i++){
            DB::table('products')->insert([
                'name'=>$faker->name,
                'image'=>"public/31.jpg",
                'category_id'=>2,
                'description'=>$faker->sentence(20),
                'price'=>500000,
                'oldPrice'=>560000,
                'quantity'=>200,
                'status'=>$faker->sentence(10),
            ]);
        }
        for($i = 0;$i < 3;$i++){
            DB::table('products')->insert([
                'name'=>$faker->name,
                'image'=>"public/21.jpg",
                'category_id'=>2,
                'description'=>$faker->sentence(20),
                'price'=>300000,
                'oldPrice'=>340000,
                'quantity'=>200,
                'status'=>$faker->sentence(10),
            ]);
        }
    }
}
