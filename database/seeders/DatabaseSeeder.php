<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\About;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            'name' => 'Administration',
            'username'  => 'admin',
            'password'  => \Illuminate\Support\Facades\Hash::make('admin123'),
            'email'     => 'admin@gmail.com',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        About::insert([
            'image' => 'about.jpg',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        Banner::insert([
            'file' => 'banner.jpg',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        Contact::create([
            'phone' => '901234567',
            'email' => 'Admin@gamil.com',
            'url' => 'url',
            'image' => 'image',
            'location' => 'manzil',
        ]);
    }
}
