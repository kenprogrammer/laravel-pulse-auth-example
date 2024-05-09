<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user=User::first();

        if(empty($default_user)){
            User::create([
                'name'=>'Test User',
                'email'=>'test@example.com',
                'username'=>'admin',
                'password'=>bcrypt('admin'),
            ]);
        }
    }
}
