<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'name'=>'admin',
            ],
            [
                'name'=>'owner',
            ],
            [
                'name'=>'marketing',
            ],
        ];

        foreach ($levels as $key => $value) {
            Level::create($value);
        }
    }
}
