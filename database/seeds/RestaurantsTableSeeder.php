<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'id' => 1,
                'adresse' => '31 rue des peupliers',
                'code_postal' => 75013,
                'ville' =>'PARIS'
            ],
            [
                'id' => 2,
                'adresse' => '12 rue rivolis',
                'code_postal' => 75012,
                'ville' =>'PARIS'
            ],
            [
                'id' => 3,
                'adresse' => '15 rue des boulet',
                'code_postal' => 75011,
                'ville' =>'PARIS'
            ]
        ]);
    }
}
