<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $imageUrl = $faker->imageUrl($width = 300, $height = 200);
        $blogs = [
            [
                'title' => 'CRUD App Overview',
                'image' => $imageUrl,
                'description' => 'Sebagai komparasi dengan framework yang saya tulis di postingan sebelumnya, aplikasi
                crud sederhana yang akan kita buat di dalam tutorial ini adalah sebuah blog sederhana. Dalam pembuatan
                aplikasi ini, kita akan mempelajari beberapa hal yang berhubungan dengan operasi yang berinteraksi
                dengan database, seperti create data, read data, update data, dan delete data. Untuk menangani operasi
                yang berinteraksi dengan database, kita akan menggunakan Eloquent, sebuah object-relational-mapper (ORM)
                dari framework laravel.',
                'user_id' => $faker->numberBetween(1, 3),

            ],
            [
                'title' => 'Step 1 - Install laravel 8',
                'image' => $imageUrl,
                'description' => 'Karena di tutorial sebelumnya kita sudah sering menggunakan composer, jadi sekarang
                kita coba install laravel 8 melalui composer juga. Kita buka terminal / cmd, lalu kita jalankan command
                di bawah ini untuk membuat project laravel 8 yang baru.


                composer create-project laravel/laravel:^8.0 blog
                Catatan: Pada proses instalasi di atas, kita menambahkan versi laravel yang akan kita install , yaitu
                laravel/laravel:^8.0 yang merujuk ke laravel versi 8. Kalau kita run pakai command composer
                create-project --prefer-dist laravel/laravel blog, maka yang akan terinstall laravel versi terbaru. FYI,
                tutorial ini masih compatible dengan laravel versi 8 juga.

                Bisa teman-teman perhatikan pada output terminal, setelah kita run command di atas, kita bisa melihat
                proses instalasi laravel 8. Setelah proses instalasi selesai kita bisa lihat folder project baru dengan
                nama blog. Kita masuk ke direktori project dengan menjalankan command.',
                'user_id' => $faker->numberBetween(1, 3),

            ],
            [
                'title' => 'Step 2 - Konfigurasi Database',
                'image' => $imageUrl,
                'description' => 'Step 2 - Konfigurasi Database
                Langkah selanjutnya adalah mengatur konfigurasi database dari project kita. Sebagai contoh di project
                kita kali ini, katakanlah nama database yang akan kita pakai itu db_blog, lalu credential mysql di
                laptop kita itu usernamenya itu admin dan passwordnya itu password.

                Teman-teman boleh membuat terlebih dahulu database dengan nama db_blog, bisa lewat phpmyadmin atau lewat
                terminal pun boleh.

                Setelah kita selesai membuat database, untuk menghubungkan dengan database db_blog harus sesuaikan
                terlebih dahulu konfigurasinya di file .env. Sekarang kita buka file .env di text editor, lalu sesuaikan
                konfigurasi database seperti di bawah ini.',
                'user_id' => $faker->numberBetween(1, 3),

            ],
            [
                'title' => 'Step 3 - Membuat Model dan Migration',
                'image' => $imageUrl,
                'description' => 'Step 3 - Membuat Model dan Migration
                Di langkah ini kita akan mencoba membuat model dan migration dengan satu artisan command. Kita buka
                kembali terminal atau cmd, kita jalankan artisan command di bawah ini.
                php artisan make:model Post -m
                Kita bisa lihat ada dua file yang berhasil digenerate menggunakan command di atas, yang pertama adalah
                file model app/Models/Post.php dan yang kedua file migration
                database/migrations/2021_08_18_043743_create_posts_table.php. Sebagai catatan nama file migration itu
                disesuaikan dengan tanggal pada saat file migration itu dibuat.',
                'user_id' => $faker->numberBetween(1, 3),

            ]
            ];

        foreach($blogs as $key => $value){
            Artikel::create($value);
        }

        foreach(range(1, 5) as $index){
            Artikel::create([
                'title' => $faker->sentence(),
                'image' => $imageUrl,
                'description' => $faker->paragraphs(2, true),
                'user_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
