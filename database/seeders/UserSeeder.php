<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $superadmin = User::create([
            'email' => 'superadmin@demo.test',
            'name' => 'Super Admin Role',
            'password' => bcrypt('12345678'),
        ]);
        $superadmin->save();
         
    }
}
