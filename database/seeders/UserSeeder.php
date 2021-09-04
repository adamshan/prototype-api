<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'email' => 'admin@admin.com',
            'name' => 'super admin',
            'phone_number' => '658920427',
            'password' => bcrypt('admin'),
            'genre' => 'M',
            'adresse' => 'douala',
            'roles' => 'ADMIN',
        ];
         User::create($admin);

    }
}
