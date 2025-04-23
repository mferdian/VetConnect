<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vet;
use App\Models\VetDate;
use App\Models\VetTime;
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
            'name' => 'Admin',
            'email' => 'admin@vetconnect.com',
            'password' => bcrypt('gugun123'),
            'is_admin' => true,
        ]);

        //     $vet = Vet::create([
        //         'nama' => 'Drh. Rino Pramudita',
        //         'email' => 'rino.vet@example.com',
        //         'no_telp' => '081234567890',
        //         'alamat' => 'Jl. Kesehatan No. 10, Surabaya',
        //         'STR' => 'STR123456789',
        //         'SIP' => 'SIP987654321',
        //         'harga' => 75000,
        //         'hewan' => json_encode(['kucing', 'anjing', 'kelinci']),
        //         'jenis_kelamin' => 'laki-laki',
        //         'foto' => 'public/images/vet1.jpg',
        //         'tgl_lahir' => '1990-07-15',
        //         'deskripsi' => 'Drh. Rino adalah dokter hewan berpengalaman lebih dari 10 tahun di bidang kesehatan hewan kecil dan eksotis. Ia dikenal sangat teliti dan ramah terhadap hewan peliharaan.',
        //     ]);

        // $vetDates = VetDate::insert([
        //         ['vet_id' => $vet->id, 'tanggal' => now()->addDays(1)->toDateString()],
        //         ['vet_id' => $vet->id, 'tanggal' => now()->addDays(2)->toDateString()],
        //         ['vet_id' => $vet->id, 'tanggal' => now()->addDays(3)->toDateString()],
        //     ]);

        // $vetDates = VetDate::where('vet_id', $vet->id )->get();

        // foreach ($vetDates as $date) {
        //     VetTime::insert([
        //         ['vet_date_id' => $date->id, 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00'],
        //         ['vet_date_id' => $date->id, 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:00:00'],
        //         ['vet_date_id' => $date->id, 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00'],
        //     ]);
        // }
    }
}
