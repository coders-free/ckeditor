<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        \App\Models\User::create([
            'name' => 'Victor Arana Flores',
            'email' => 'victor.aranaf92@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\Post::factory(5)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
