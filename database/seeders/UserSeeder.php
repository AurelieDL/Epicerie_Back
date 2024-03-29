<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Detail::factory(10)->create();

        User::factory()->count(10)->create();
    }
}
