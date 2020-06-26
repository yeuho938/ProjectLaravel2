<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
        'name'=>'Áo sơ mi',
       ]);
       DB::table('categories')->insert([
        'name'=>'Váy',
       ]);
       DB::table('categories')->insert([
        'name'=>'Quần',
       ]);
    }
}
