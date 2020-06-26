<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    public function run(Faker $faker)
    {   
    	
        DB::table('users')->insert([
        	'fullname'=>$faker->name,
            'username' => "admin",     
            'password' => Hash::make('admin'),
            'email'=>$faker->unique->email,
            'address'=>$faker->city,
            'phone'=>$faker->phoneNumber,           
            'role' => 1,
        ]);
        DB::table('users')->insert([
            'fullname'=>$faker->name,
            'username' => "user",     
            'password' => Hash::make('user'),
            'email'=>$faker->unique->email,
            'address'=>$faker->city,
            'phone'=>$faker->phoneNumber,           
            'role' => 0,
        ]);
    }
}
