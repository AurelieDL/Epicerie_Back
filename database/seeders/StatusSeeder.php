<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
            array(
                'id' => '1',
                'name' => 'actif',
                'last_update' => '2023-02-02'
            ),

            array(
                'id' => '2',
                'name' => 'archivé',
                'last_update' => '2023-02-02'
            ),

            array(
                'id' => '3',
                'name' => 'supprimé',
                'last_update' => '2023-02-02'
            ),


        );

        foreach ($status as $statu) {
            DB::table('status')->updateOrInsert(['id' => $statu['id'], 'name' => $statu['name'], 'last_update' => $statu['last_update']]);
        }
    }
}
