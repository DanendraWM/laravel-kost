<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\inap;
use App\Models\kategori;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'name' => 'danendra',
            'email' => 'dan@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'user',
        ]);
        user::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',
        ]);
        kategori::create([
            'name' => 'hotel',
            'slug' => 'hotel',
        ]);
        kategori::create([
            'name' => 'kontrakan',
            'slug' => 'house',
        ]);
        kategori::create([
            'name' => 'villa',
            'slug' => 'villa',
        ]);
        inap::create([
            'kategori_id' => '2',
            'nama' => 'Kosan Putra bangsa',
            'slug' => 'Kosan-Putra-bangsa',
            'harga' => '70000',
            'lokasi' => 'jakarta',
            'gambar' => 'imag.jpg',
            'fasilitas' => 'Kamar Mandi',
        ]);
        inap::create([
            'kategori_id' => '1',
            'nama' => 'Hotel Bangsa',
            'slug' => 'Hotel-Bangsa',
            'harga' => '500000',
            'lokasi' => 'jakarta',
            'gambar' => 'img1.jpg',
            'fasilitas' => 'Ac, TV, WIFI, Kamar Mandi',
        ]);
        inap::create([
            'kategori_id' => '3',
            'nama' => 'Meruya Villa',
            'slug' => 'Meruya-Villa',
            'harga' => '2560000',
            'lokasi' => 'jakarta',
            'gambar' => 'vila1.jpeg',
            'fasilitas' => 'Ac, TV, WIFI, Kamar Mandi',
        ]);
        inap::create([
            'kategori_id' => '2',
            'nama' => 'Keluarga senang',
            'slug' => 'Keluarga-senang',
            'harga' => '70000',
            'lokasi' => 'jakarta',
            'gambar' => 'img2.jpg',
            'fasilitas' => 'Kamar Mandi',
        ]);
        inap::create([
            'kategori_id' => '1',
            'nama' => 'Hotel season',
            'slug' => 'Hotel-season',
            'harga' => '3000000',
            'lokasi' => 'jakarta',
            'gambar' => 'hotel1.jpg',
            'fasilitas' => 'Ac, TV, WIFI, Renang, GYM',
        ]);
        inap::create([
            'kategori_id' => '3',
            'nama' => 'Villa Ringkih',
            'slug' => 'Villa-Ringkih',
            'harga' => '3400000',
            'lokasi' => 'jakarta',
            'gambar' => 'pict.jpg',
            'fasilitas' => 'Ac, TV, WIFI, Kamar Mandi',
        ]);
    }
}
