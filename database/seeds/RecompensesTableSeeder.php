<?php

use Illuminate\Database\Seeder;

class RecompensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recompenses')->insert([
            [
                'id' => 1,
                'nom_recompense' => 'une entrée ou un dessert au choix'
            ],
            [
                'id' => 2,
                'nom_recompense' => ' un burger au choix'
            ],
            [
                'id' => 3,
                'nom_recompense' => 'un menu du jour'
            ],
            [
                'id' => 4,
                'nom_recompense' => 'un menu au choix'
            ],
            [
                'id' => 5,
                'nom_recompense' => '70% de réduction'
            ]
        ]);
    }
}
