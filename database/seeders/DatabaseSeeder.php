<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //   User::factory(10)->create();
        $user = User::factory()->make([
            'name' => 'Abigail Otwell',
            'email' => 'a@a.com',
            'password' => Hash::make('0000'),
            'role' => '1',
            'role_id' => '2',
            'detail_id' => '3',

        ]);
        $user->save();
    }
}
