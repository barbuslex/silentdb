<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        Group::create(array('name' => 'Utilisateurs', 'description' => 'Utilisateurs du site', 'color' => '#2980b9'));
        Group::create(array('name' => 'Administrateurs', 'description' => 'Administrateurs du site', 'color' => '#c0392b'));
    }

}
