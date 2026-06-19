<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@denso.co.id',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            CompanyProfileSeeder::class,
            ProductSeeder::class,
            ArticleSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
