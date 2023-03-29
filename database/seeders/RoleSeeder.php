<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array(
                'id' => '1',
                'role' => 'admin'
            ),

            array(
                'id' => '2',
                'role' => 'bureau'
            ),

            array(
                'id' => '3',
                'role' => 'salarié'
            ),
        );

        foreach($roles as $role) {
           DB::table('roles')->updateOrInsert(['id' => $role['id']], ['role' => $role['role']]);
        }
    }
}
