<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'kzt',
            'email' => 'kzt@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id,
        ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston MA',
        //     'email' => 'email@gamil.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio dicta, eligendi voluptatum quisquam velit enim eum laborum facilis beatae culpa dolores ut eius quod tempora officiis quae deleniti rerum! Consequatur!',
        // ]);
    }
}
