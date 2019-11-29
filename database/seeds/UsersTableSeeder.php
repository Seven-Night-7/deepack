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
        $time = now();

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'account' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make(123456),
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    }
}
