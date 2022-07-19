<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $level = new \App\Models\level();
        $level->name = 'Beginner';
        $level->save();
        $level = new \App\Models\level();
        $level->name = 'Intermediate';
        $level->save();
        $level = new \App\Models\level();
        $level->name = 'Advanced';
        $level->save();

    }
}
