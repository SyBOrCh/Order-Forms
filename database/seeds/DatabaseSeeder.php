<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name'  => 'John',
            'email' => 'j.braun@vu.nl',
            'password'  => bcrypt('password'),
            'budgetnumber'  => '200000',
            'phone' => '020-1234567',
            'location'  => '4W35',
            'vunetid'   => 'jbn478',
            'vunetpassword'  => 'password',
       ]); 

        $labs = ['4W35', '4W19'];
        $solventTypes = ['halogen rich', 'halogen poor'];

        $actions = ['collect', 'deliver'];

        $containerColors = [
            'Blue',
            'Green',
            'Red',
            'White',
            'Black',
        ];

        $gasses = [
            'Argon 5.0',
            'Helium 5.0',
            'Hydrogen 5.0',
            'Oxygen 5.0',
            'CO2 (with riser)',
        ];

        foreach ($actions as $action) {
            // Insert all liquid waste containers
            foreach ($containerColors as $color) {
                \App\Item::create(['type' => $color . ' waste container', 'category' => 'waste containers', 'action' => $action]);
            }
            // Insert solid waste containers 
            \App\Item::create(['type' => 'Solid waste container', 'category' => 'solid waste', 'action' => $action]);
        }

        \App\Item::create(['type' => 'Liquid nitrogen tank', 'category' => 'liquid nitrogen', 'action' => 'deliver']);

        foreach ($gasses as $gas) {
            \App\Item::create(['type' => $gas, 'category' => 'gasses', 'action' => 'deliver']);
        }

        foreach ($labs as $lab) {
            foreach ($solventTypes as $solventType) {
                \App\Item::create(['type' => 'Labbutler ' . $lab . ' ('. $solventType .')', 'category' => 'lab butler', 'action' => 'collect']);
            }
        }

        \App\Item::create(['type' => 'SZA container', 'category' => 'general waste', 'action' => 'deliver']);
        // \App\Item::create(['type' => 'Glasbak', 'category' => 'general waste', 'action' => 'deliver']);
        // \App\Item::create(['type' => 'Papierbak', 'category' => 'general waste', 'action' => 'deliver']);
        // \App\Item::create(['type' => 'Plastic', 'category' => 'general waste', 'action' => 'deliver']);

    }
}
