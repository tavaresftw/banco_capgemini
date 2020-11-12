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
            $user = new \App\User ([
                'name' => 'teste2',
                'email' => 'teste2@gmail.com',
                'password' => Hash::make('teste2'),
                'remember_token' => Str::random(10),
            ]);
            $user->save();
            $user->accounts()->saveMany(
                [                    
                   new \App\Accounts ([
                    'account_number' => 2
                    ])
                ]
            );;
    }
}
