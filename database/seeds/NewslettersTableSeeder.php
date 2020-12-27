<?php

use Illuminate\Database\Seeder;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsletters')->insert([
            [
                'id' => 1,
                'titre' => 'Gros lot à gagner, jeux 100% gagnant',
                'contenu' =>"Ne ratez pas la possibilité de gagner un gros lot (burger, menu, entrée, dessert ou réduction à 70% sur un menu) pour l'achat d'un menu à partir de 18 euros et  parmis ces gagnants un remportera une range rover"
            ]
        ]);
    }
}
