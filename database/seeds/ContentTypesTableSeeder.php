<?php

use Illuminate\Database\Seeder;

class ContentTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('content_types')->insert([
            'name' => 'Criptomoneda',
        ]);

        DB::table('content_types')->insert([
            'name' => 'Informativo',
        ]);
    }
}
