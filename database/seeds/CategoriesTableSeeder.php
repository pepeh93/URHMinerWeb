<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Altcoins de URH Miner',
        ]);


        DB::table('categories')->insert([
            'name' => 'Historia de criptomonedas',
        ]);


        DB::table('categories')->insert([
            'name' => 'Manuales de URH Miner',
        ]);
    }
}
