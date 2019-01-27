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
            'email' => 'jbraunnl@gmail.com',
            'password'  => bcrypt('password'),
            'budgetnumber'  => '200000',
            'location'  => '4W35',
       ]); 

       $labs = ['4W35', '4W19'];

        $actions = ['collect', 'deliver'];

        $containerColors = [
            'Blue',
            'Green',
            'Red',
            'White'
        ];

        $gasses = [
            'Argon 5.0',
            'Argon 6.0',
            'Koolzuur 4.6',
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
            \App\Item::create(['type' => 'Labbutler', 'category' => 'lab butler', 'action' => 'collect']);
        }
    }
}
