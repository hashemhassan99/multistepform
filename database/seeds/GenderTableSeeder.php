<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Gender::create([
            'name' => 'ذكر'
        ]);

        \App\Gender::create([
            'name' => 'انثى'
        ]);
    }
}
