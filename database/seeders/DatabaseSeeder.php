<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vet;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Vet::create([
            'nama' => 'Dr. Usman Ademola',
            'email' => 'usman@example.com',
            'no_telp' => '08123456789',
            'alamat' => 'Surabaya, Jawa Timur',
            'STR' => '123456',
            'SIP' => '654321',
            'hewan' => json_encode(['Anjing', 'Kucing']),
            'jenis_kelamin' => 'laki-laki',
            'foto' => 'default.jpg',
            'tgl_lahir' => '1985-06-15',
            'deskripsi' => 'Dokter hewan berpengalaman selama 16 tahun.',
        ]);

    }
}
