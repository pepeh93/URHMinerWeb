<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test_admin@gmail.com',
            'password' => bcrypt('test'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test'),
            'role_id' => 2
        ]);

        DB::table('favorites')->insert([
            'user_id' => 1,
            'content_id' => 1,
        ]);

        DB::table('favorites')->insert([
            'user_id' => 1,
            'content_id' => 2,
        ]);

        DB::table('favorites')->insert([
            'user_id' => 1,
            'content_id' => 3,
        ]);
    }
}
