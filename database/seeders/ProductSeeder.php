<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // --- KATEGORI: BAN ---
            [
                'name' => 'Michelin Pilot Street Ring 14',
                'category' => 'Ban',
                'brand' => 'Michelin',
                'price' => 350000,
                'stock' => 'Tersedia',
                'desc' => 'Ban tubeless premium dengan cengkeraman maksimal di jalan basah dan kering.',
                'icon' => 'disc',
                'image' => 'michelin_pilot_street.png'
            ],
            [
                'name' => 'Michelin City Grip 2 Ring 14',
                'category' => 'Ban',
                'brand' => 'Michelin',
                'price' => 420000,
                'stock' => 'Tersedia',
                'desc' => 'Ban skuter premium dengan alur ban labirin untuk pembuangan air sangat maksimal.',
                'icon' => 'disc',
                'image' => 'michelin_pilot_street.png'
            ],
            [
                'name' => 'Pirelli Diablo Rosso Sport',
                'category' => 'Ban',
                'brand' => 'Pirelli',
                'price' => 490000,
                'stock' => 'Tersedia',
                'desc' => 'Ban sport balap premium ring 17 untuk kestabilan tinggi pada kecepatan penuh.',
                'icon' => 'disc',
                'image' => 'pirelli_diablo_rosso.png'
            ],
            [
                'name' => 'Pirelli Angel Scooter Ring 14',
                'category' => 'Ban',
                'brand' => 'Pirelli',
                'price' => 395000,
                'stock' => 'Tersedia',
                'desc' => 'Ban harian premium dengan struktur tangguh untuk kenyamanan melintasi jalan berlubang.',
                'icon' => 'disc',
                'image' => 'pirelli_angel_scooter.png'
            ],
            [
                'name' => 'Planeto Gold Ring 14',
                'category' => 'Ban',
                'brand' => 'Planeto',
                'price' => 215000,
                'stock' => 'Tersedia',
                'desc' => 'Ban awet dan hemat bahan bakar dengan pola kembangan yang modern dan dalam.',
                'icon' => 'disc',
                'image' => 'planeto_gold.png'
            ],
            [
                'name' => 'FDR Sport XR Evo Ring 14',
                'category' => 'Ban',
                'brand' => 'FDR',
                'price' => 260000,
                'stock' => 'Stok Terbatas',
                'desc' => 'Ban tubeless harian dengan desain sporty untuk kenyamanan manuver tajam.',
                'icon' => 'disc',
                'image' => 'fdr_sport_xr.png'
            ],
            [
                'name' => 'Aspira Premio Sportivo Ring 14',
                'category' => 'Ban',
                'brand' => 'Aspira',
                'price' => 245000,
                'stock' => 'Tersedia',
                'desc' => 'Didesain khusus dengan teknologi Italia menghasilkan keawetan ban luar biasa.',
                'icon' => 'disc',
                'image' => 'planeto_gold.png'
            ],
            [
                'name' => 'Michelin Pilot Moto GP Ring 17',
                'category' => 'Ban',
                'brand' => 'Michelin',
                'price' => 520000,
                'stock' => 'Tersedia',
                'desc' => 'Ban balap harian berdaya cengkeram ultra tinggi, stabil di kemiringan ekstrem.',
                'icon' => 'disc',
                'image' => 'michelin_pilot_motogp.png'
            ],
            [
                'name' => 'Maxxis Victra S98 ST Ring 14',
                'category' => 'Ban',
                'brand' => 'Maxxis',
                'price' => 310000,
                'stock' => 'Tersedia',
                'desc' => 'Ban tubeless dengan karet dual-compound untuk kontrol maksimal di kecepatan tinggi.',
                'icon' => 'disc',
                'image' => 'maxxis_victra_s98.png'
            ],
            // --- KATEGORI: OLI ---
            [
                'name' => 'X-Ten Ester Synthetic Matic 10W-30',
                'category' => 'Oli',
                'brand' => 'X-Ten',
                'price' => 55000,
                'stock' => 'Tersedia',
                'desc' => 'Oli motor matic super premium berbasis ester untuk menjaga mesin tetap dingin dan bertenaga.',
                'icon' => 'droplets',
                'image' => 'xten_ester_synthetic.png'
            ],
            [
                'name' => 'Shell Advance AX7 Matic 10W-30',
                'category' => 'Oli',
                'brand' => 'Shell',
                'price' => 65000,
                'stock' => 'Tersedia',
                'desc' => 'Oli semi-sintetis matic dengan teknologi pembersih aktif untuk mencegah pengendapan kotoran.',
                'icon' => 'droplets',
                'image' => 'shell_advance_ax7.png'
            ],
            [
                'name' => 'Castrol Power1 10W-40 4T',
                'category' => 'Oli',
                'brand' => 'Castrol',
                'price' => 58000,
                'stock' => 'Tersedia',
                'desc' => 'Formulasi 3-in-1 untuk akselerasi instan, perlindungan mesin luar biasa, dan perpindahan gigi mulus.',
                'icon' => 'droplets',
                'image' => 'castrol_power1.png'
            ],
            [
                'name' => 'Motul GP Power 4T 10W-40',
                'category' => 'Oli',
                'brand' => 'Motul',
                'price' => 75000,
                'stock' => 'Tersedia',
                'desc' => 'Oli berlisensi resmi MotoGP untuk perlindungan aus maksimal dan respons tarikan instan.',
                'icon' => 'droplets',
                'image' => 'motul_gp_power.png'
            ],
            [
                'name' => 'Pertamina Enduro Matic-G 20W-40',
                'category' => 'Oli',
                'brand' => 'Pertamina',
                'price' => 45000,
                'stock' => 'Tersedia',
                'desc' => 'Oli matic berkualitas tinggi yang andal melindungi mesin dari gesekan ekstrem jalanan kota.',
                'icon' => 'droplets',
                'image' => 'pertamina_enduro.png'
            ],
            [
                'name' => 'Yamalube Super Matic 10W-40',
                'category' => 'Oli',
                'brand' => 'Yamaha',
                'price' => 70000,
                'stock' => 'Tersedia',
                'desc' => 'Oli full sintetis khusus untuk skuter matik premium berkapasitas besar.',
                'icon' => 'droplets',
                'image' => 'xten_ester_synthetic.png'
            ],
            [
                'name' => 'X-Ten Gear Oil Matic 120ml',
                'category' => 'Oli',
                'brand' => 'X-Ten',
                'price' => 18000,
                'stock' => 'Tersedia',
                'desc' => 'Pelumas roda gigi transmisi otomatis matic untuk suara mesin halus dan perpindahan gigi responsif.',
                'icon' => 'droplets',
                'image' => 'xten_gear_oil.png'
            ],
            [
                'name' => 'Shell Advance Ultra 10W-40',
                'category' => 'Oli',
                'brand' => 'Shell',
                'price' => 115000,
                'stock' => 'Tersedia',
                'desc' => 'Oli 100% sintetis murni dengan perlindungan mesin tingkat balap profesional.',
                'icon' => 'droplets',
                'image' => 'shell_advance_ultra.png'
            ],
            [
                'name' => 'Ipone Katana Scoot 5W-40',
                'category' => 'Oli',
                'brand' => 'Ipone',
                'price' => 145000,
                'stock' => 'Tersedia',
                'desc' => 'Oli motor matic full sintetis impor Perancis untuk performa dan akselerasi ekstrem.',
                'icon' => 'droplets',
                'image' => 'ipone_katana_scoot.png'
            ],
            // --- KATEGORI: AKI ---
            [
                'name' => 'GS Astra MF YTZ-5S',
                'category' => 'Aki',
                'brand' => 'GS Astra',
                'price' => 245000,
                'stock' => 'Tersedia',
                'desc' => 'Aki kering bebas perawatan (maintenance-free) kualitas bawaan pabrik dengan starter andal.',
                'icon' => 'battery',
                'image' => 'gs_astra_battery.png'
            ],
            [
                'name' => 'Yuasa MF YTZ-5S',
                'category' => 'Aki',
                'brand' => 'Yuasa',
                'price' => 230000,
                'stock' => 'Tersedia',
                'desc' => 'Aki kering dengan performa start tinggi dan daya tahan ekstra di segala cuaca.',
                'icon' => 'battery',
                'image' => 'yuasa_battery.png'
            ],
            [
                'name' => 'Motobatt Gel MTZ5S',
                'category' => 'Aki',
                'brand' => 'Motobatt',
                'price' => 265000,
                'stock' => 'Tersedia',
                'desc' => 'Aki gel premium berdaya starter sangat tinggi dengan umur pakai hingga 2 kali aki biasa.',
                'icon' => 'battery',
                'image' => 'motobatt_gel.png'
            ],
            // --- KATEGORI: SUKU CADANG ---
            [
                'name' => 'Kampas Rem Depan Cakram',
                'category' => 'Suku Cadang',
                'brand' => 'Astra Otoparts',
                'price' => 45000,
                'stock' => 'Tersedia',
                'desc' => 'Kampas rem depan bahan keramik tidak merusak piringan cakram, pakem, dan bebas bising.',
                'icon' => 'settings',
                'image' => 'kampas_rem_depan.png'
            ],
            [
                'name' => 'Kampas Rem Belakang Tromol',
                'category' => 'Suku Cadang',
                'brand' => 'Astra Otoparts',
                'price' => 38000,
                'stock' => 'Tersedia',
                'desc' => 'Kampas rem tromol pakem dengan daya tahan panas tinggi untuk keselamatan berkendara.',
                'icon' => 'settings',
                'image' => 'kampas_rem_depan.png'
            ],
            [
                'name' => 'V-Belt Kit Federal Matic',
                'category' => 'Suku Cadang',
                'brand' => 'Federal',
                'price' => 135000,
                'stock' => 'Tersedia',
                'desc' => 'Paket V-belt dan roller berkualitas OEM untuk meminimalkan slip dan menjaga akselerasi matic.',
                'icon' => 'settings',
                'image' => 'vbelt_kit_federal.png'
            ],
            [
                'name' => 'Busi NGK Iridium CPR9EAIX-9',
                'category' => 'Suku Cadang',
                'brand' => 'NGK',
                'price' => 95000,
                'stock' => 'Stok Terbatas',
                'desc' => 'Busi iridium premium untuk pengapian presisi, starter lebih cepat, dan efisiensi bahan bakar maksimal.',
                'icon' => 'settings',
                'image' => 'busi_ngk_iridium.png'
            ],
            [
                'name' => 'Shockbreaker Belakang KYB Zeto 300mm',
                'category' => 'Suku Cadang',
                'brand' => 'Kayaba',
                'price' => 310000,
                'stock' => 'Tersedia',
                'desc' => 'Suspensi belakang premium empuk dengan setelan preload yang bisa disesuaikan beban berkendara.',
                'icon' => 'settings',
                'image' => 'kyb_zeto.png'
            ],
            [
                'name' => 'Filter Udara Aspira Honda Beat FI',
                'category' => 'Suku Cadang',
                'brand' => 'Aspira',
                'price' => 42000,
                'stock' => 'Tersedia',
                'desc' => 'Saringan udara presisi tinggi untuk menyaring debu secara optimal dan menjaga tarikan motor.',
                'icon' => 'settings',
                'image' => 'vbelt_kit_federal.png'
            ],
            [
                'name' => 'Busi Denso Iridium Power IU27',
                'category' => 'Suku Cadang',
                'brand' => 'Denso',
                'price' => 90000,
                'stock' => 'Tersedia',
                'desc' => 'Busi iridium Jepang premium dengan ujung elektroda 0.4mm untuk respons mesin instan.',
                'icon' => 'settings',
                'image' => 'busi_denso_iridium.png'
            ]
        ];

        foreach ($products as $p) {
            DB::table('products')->updateOrInsert(
                ['name' => $p['name']],
                array_merge($p, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
