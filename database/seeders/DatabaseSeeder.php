<?php

namespace Database\Seeders;

use App\Models\SelectionPhase;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
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
            'name' => 'Jabbar A. Panggabean',
            'email' => 'jabbarpanggabean@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('bism!LLAH99'),
            'is_admin' => false,
        ]);

        User::factory()->create([
            'name' => 'Panggabean Ali Jabbar',
            'email' => 'jabbarp17@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('bism!LLAH99'),
            'is_admin' => true,
        ]);

        $phases = [
            [
                'name'        => 'Tes Administrasi',
                'description' => 'Pemeriksaan dokumen dan berkas persyaratan.',
                'start_date'  => Carbon::now()->subDays(7),  // Contoh: mulai 7 hari lalu
                'end_date'    => Carbon::now()->addDays(7),  // Berakhir 7 hari mendatang
                'is_active'   => true,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Tes Tertulis',
                'description' => 'Ujian tertulis untuk menguji pengetahuan umum.',
                'start_date'  => Carbon::parse('2025-05-01 08:00:00'),
                'end_date'    => Carbon::parse('2025-05-01 12:00:00'),
                'is_active'   => false, // misalnya belum aktif atau sudah selesai
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Wawancara',
                'description' => 'Sesi wawancara dengan tim seleksi.',
                'start_date'  => Carbon::parse('2025-06-01 09:00:00'),
                'end_date'    => Carbon::parse('2025-06-05 15:00:00'),
                'is_active'   => false,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        foreach ($phases as $phase) {
            SelectionPhase::create($phase);
        }
    }
}
