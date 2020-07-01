<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0;$i < 5;$i++){
    		DB::table('discounts')->insert([
    			'name'=>$faker->name,  			
    			'percent'=>30,
    		]);
    	}

            DB::table('discounts')->insert([
                'name'=>"Yeu",           
                'percent'=>50,
            ]);
       DB::table('discounts')->insert([
                'name'=>"Laodai",           
                'percent'=>70,
            ]);
        DB::table('discounts')->insert([
                'name'=>"Yeuho",           
                'percent'=>20,
            ]);
    }
}
