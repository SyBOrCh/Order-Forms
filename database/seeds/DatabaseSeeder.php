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

        $actions = ['collect', 'deliver'];

        $containerColors = [
            'Blue',
            'Green',
            'Blue',
            'White'
        ];

        foreach ($actions as $action) {
            // Insert all liquid waste containers
            foreach ($containerColors as $color) {
                \App\Item::create(['type' => $color . ' waste container', 'action' => $action]);
            }
            // Insert solid waste containers 
            \App\Item::create(['type' => 'Solid waste container', 'action' => $action]);
        }

        \App\Item::create(['type' => 'Liquid nitrogen tank', 'action' => 'deliver']);
        \App\Item::create(['type' => 'Argon ', 'action' => 'deliver']);
    }
}
