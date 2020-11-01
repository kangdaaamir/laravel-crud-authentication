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
            [
                'first_name'     => 'Aamir',
                'last_name'     => 'Kangda',
                'email'    => 'aamir@gmail.com',
                'password' => bcrypt('aamir'),
                'phone' => '8866173696',
            ]
        ]);
    }
}
