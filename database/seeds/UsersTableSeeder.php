<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => '',
                'nom' => 'Trinidad',
                'prenom' => 'Gilbert',
                'email' => 'gilbert.trinidad@gmail.com',
                'date_naissance' => '1993-09-08',
                'telephone' => '0666515576',
                'majeur' => true,
                'cgu' => true,
                'newsletter' => true,
                'password' => '$2y$10$7VZCS5kOZIk/1bbJtTgoI.uu94UU5DlCvrMkAhHAsLrnlem2xpCJ6',
                'role_id' => 1,
                'provider' => 'none',
                'provider_id' => '0'
            ],
            [
                'id' => 2,
                'name' => '',
                'nom' => 'nomCaissiere',
                'prenom' => 'prenomCaissiere',
                'email' => 'caissiere@gmail.com',
                'date_naissance' => '1993-01-24',
                'telephone' => '0625312345',
                'majeur' => true,
                'cgu' => true,
                'newsletter' => true,
                'password' => '$2y$10$7VZCS5kOZIk/1bbJtTgoI.uu94UU5DlCvrMkAhHAsLrnlem2xpCJ6',
                'role_id' => 2,
                'provider' => 'none',
                'provider_id' => '0'
            ],
            [
                'id' => 3,
                'name' => '',
                'nom' => 'nomManager',
                'prenom' => 'prenomManager',
                'email' => 'manager@gmail.com',
                'date_naissance' => '1993-02-03',
                'telephone' => '0666515572',
                'majeur' => true,
                'cgu' => true,
                'newsletter' => true,
                'password' => '$2y$10$7VZCS5kOZIk/1bbJtTgoI.uu94UU5DlCvrMkAhHAsLrnlem2xpCJ6',
                'role_id' => 3,
                'provider' => 'none',
                'provider_id' => '0'
            ],
            [
                'id' => 4,
                'name' => '',
                'nom' => 'admin',
                'prenom' => 'admin',
                'email' => 'admin@gmail.com',
                'date_naissance' => '1993-10-08',
                'telephone' => '0666515570',
                'majeur' => true,
                'cgu' => true,
                'newsletter' => true,
                'password' => '$2y$10$7VZCS5kOZIk/1bbJtTgoI.uu94UU5DlCvrMkAhHAsLrnlem2xpCJ6',
                'role_id' => 4,
                'provider' => 'none',
                'provider_id' => '0'
            ]
        ]);
    }
}
