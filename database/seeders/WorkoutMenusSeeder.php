<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workoutMenus = [
            ['name' => '腕立て'],
            ['name' => 'スクワット'],
            ['name' => '懸垂'],
            ['name' => 'プランク'],
            ['name' => 'ダンベルスクワット'],
            ['name' => 'ベンチプレス'],
        ];

        DB::table('workout_menus')->insert($workoutMenus);
    }
}