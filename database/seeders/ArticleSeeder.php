<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Article::insert([
            [
                'title' => 'DENSO announces its commitment to sustainability',
                'image' => 'articles/sustainability_denso.png',
                'content' => 'DENSO has announced its global commitment to reduce carbon footprint and promote sustainable manufacturing across all its plants by 2030. The initiative includes advanced recycling and renewable energy adoption.',
                'published_at' => '2026-04-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Autonomous Driving Technology Unveiled',
                'image' => 'articles/autonomous_driving_denso.png',
                'content' => 'At the recent mobility show, DENSO unveiled its state-of-sate autonomous driving systems. Using advanced LiDAR and AI processing, the new system promises to enhance driver safety and comfort.',
                'published_at' => '2026-04-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'DENSO Expands Operations in Southeast Asia',
                'image' => 'articles/expansion_se_asia_denso.png',
                'content' => 'To meet the growing demand for automotive components in the region, DENSO is opening two new manufacturing facilities in Southeast Asia. This expansion will create over 2000 jobs locally.',
                'published_at' => '2026-04-26',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
