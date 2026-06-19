<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::insert([
            [
                'title'       => 'Kantor Utama DENSO Indonesia',
                'image'       => 'galleries/denso_office.png',
                'description' => 'Gedung kantor pusat dan fasilitas administrasi DENSO Indonesia yang modern dan ramah lingkungan.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Lini Produksi Otomotif Canggih',
                'image'       => 'galleries/denso_hero.png',
                'description' => 'Fasilitas manufaktur berteknologi tinggi dengan otomatisasi presisi untuk memproduksi komponen berkualitas.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Inovasi Teknologi Masa Depan',
                'image'       => 'galleries/denso_news.png',
                'description' => 'Tim riset dan pengembangan berkolaborasi dalam merancang solusi mobilitas pintar dan ramah lingkungan.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        ]);
    }
}
