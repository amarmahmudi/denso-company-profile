<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed data produk DENSO.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Sistem Termal',
                'description' => 'AC Mobil, Radiator, dan sistem pendingin lainnya yang memberikan kenyamanan maksimal bagi pengemudi dan penumpang.',
                'price'       => null,
                'image'       => 'products/prod_thermal.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sistem Powertrain',
                'description' => 'Komponen mesin injeksi bahan bakar yang meningkatkan efisiensi dan mengurangi emisi gas buang untuk lingkungan yang lebih bersih.',
                'price'       => null,
                'image'       => 'products/prod_powertrain.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sistem Mobilitas Elektronik',
                'description' => 'Sistem keselamatan tingkat lanjut seperti sensor radar dan kamera yang mendukung teknologi pengemudian otonom (ADAS).',
                'price'       => null,
                'image'       => 'products/prod_mobility.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sistem Elektrifikasi',
                'description' => 'Inverter, motor generator, dan komponen inti untuk kendaraan hybrid dan listrik (EV) guna mendukung mobilitas berkelanjutan.',
                'price'       => null,
                'image'       => 'products/prod_electrification.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Produk Aftermarket',
                'description' => 'Suku cadang berkualitas seperti busi, wiper, dan filter kabin yang memastikan performa kendaraan Anda tetap optimal.',
                'price'       => null,
                'image'       => 'products/prod_aftermarket.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sistem Industri',
                'description' => 'Robotika pabrik, peralatan otomasi, dan sistem identifikasi otomatis (Auto-ID) seperti pemindai barcode canggih.',
                'price'       => null,
                'image'       => 'products/prod_industrial.png',
                'is_active'   => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
