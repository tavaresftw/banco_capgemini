<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
            DB::table('users')->insert([
                'name' => 'teste',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('teste'),
                'remember_token' => Str::random(10),
            ]);
    }
}
