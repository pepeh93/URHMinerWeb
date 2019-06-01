<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'name' => 'Usuario',
        ]);
    }

}
