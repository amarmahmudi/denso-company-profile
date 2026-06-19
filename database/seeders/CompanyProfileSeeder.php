<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Seed data profil perusahaan DENSO.
     */
    public function run(): void
    {
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'DENSO Indonesia',
                'description'  => 'Didirikan pada tahun 1949 sebagai produsen komponen listrik otomotif, DENSO telah berkembang menjadi salah satu pemasok otomotif terbesar di dunia. Di Indonesia, DENSO mulai beroperasi pada tahun 1975, memberikan kontribusi signifikan terhadap industri otomotif nasional dengan memproduksi komponen-komponen berkualitas tinggi.',
                'vision'       => 'Menciptakan masa depan di mana mobilitas yang aman dan ramah lingkungan tersedia untuk semua orang, dengan secara konsisten mengembangkan teknologi yang canggih dan inovatif.',
                'mission'      => 'Berkontribusi pada dunia yang lebih baik dengan menciptakan nilai bersama visi untuk masa depan, mendorong inisiatif yang memberdayakan masyarakat dan melestarikan lingkungan bumi.',
                'address'      => 'Jl. Gaya Motor I No. 6, Sunter II, Jakarta Utara 14330, Indonesia',
                'phone'        => '(021) 6501000',
                'email'        => 'info@denso.co.id',
            ]
        );
    }
}
