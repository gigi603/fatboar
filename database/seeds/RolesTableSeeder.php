<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nom_role' => 'utilisateur'
            ],
            [
                'id' => 2,
                'nom_role' => 'caissière'
            ],
            [
                'id' => 3,
                'nom_role' => 'manager'
            ],
            [
                'id' => 4,
                'nom_role' => 'admin'
            ]
        ]);
    }
}
