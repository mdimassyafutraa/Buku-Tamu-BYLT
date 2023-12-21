<?php

use Illuminate\Database\Seeder;
use App\Models\Tamu;
use Faker\Factory as Faker;

class TamuSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            Tamu::create([
                'user_id' => $faker->numberBetween(1, 10),
                'qr_code' => $faker->uuid,
                'name' => $faker->name,
                'alamat' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'profesi' => $faker->jobTitle,
                'instansi' => $faker->company,
                'tanggal_kunjungan' => $faker->date(),
                'waktu_kunjungan' => $faker->time(),
                'tujuan' => $faker->sentence,
                'status' => $faker->randomElement(['Belum Hadir', 'Sudah Hadir']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
