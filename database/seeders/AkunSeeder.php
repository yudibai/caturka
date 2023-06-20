<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'level'=>'admin',
                'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'owner',
                'name'=>'owner',
                'email'=>'owner@owner.com',
                'level'=>'owner',
                'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'user',
                'name'=>'ini akun User (non owner)',
                'email'=>'user@user.com',
                'level'=>'user',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
