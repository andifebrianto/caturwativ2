<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profil;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Andi',
            'username' => 'andifebrianto',
            'email' => 'andi@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Profil::factory(1)->create();
    }
}
