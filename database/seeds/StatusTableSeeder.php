<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => 'متزوج'
        ]);

        Status::create([
            'status' => 'أعزب'
        ]);
        Status::create([
            'status' => 'مطلق'
        ]);
    }
}
