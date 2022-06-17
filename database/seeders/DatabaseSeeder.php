<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Catatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        User::create([
            'nik' =>'1270116109650004',
            'name' =>'riko putra pratama',
            'email' =>'rikoputra@gmail.com',
            'password' =>bcrypt('12345')
        ]);

        User::create([
            'nik' => '1270116109650003',
            'name' => 'Rafael Muhammad',
            'email' => 'Rafael@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'nik' => '1270116109650002',
            'name' => 'Juminten Sukaningsih',
            'email' => 'juminten123@gmail.com',
            'password' => bcrypt('12345')
        ]);
        
        User::create([
            'nik' => '1270112102040003',
            'name' => 'Ilham Kurniawan',
            'email' => 'ilhamkurniawan@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Catatan::create([
            'user_id' => 1,
            'tanggal' => '2021/09/13',
            'waktu' => '08:00',
            'lokasi' => 'Toko Buku Hangat',
            'suhu' => '36.2'
        ]);

        Catatan::create([
            'user_id' => 1,
            'tanggal' => '2021/09/13',
            'waktu' => '10:00',
            'lokasi' => 'Bulan Dept Store',
            'suhu' => '36.2'
        ]);

        Catatan::create([
            'user_id' => 1,
            'tanggal' => '2021/09/16',
            'waktu' => '15:00',
            'lokasi' => 'Pagi Jogging Area',
            'suhu' => '37.0'
        ]);
    }
}
