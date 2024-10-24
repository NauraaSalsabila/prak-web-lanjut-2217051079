<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'MIPA',
        ];

        foreach ($data as $fakultas) {
            Fakultas::create([
                'nama_fakultas' => $fakultas,
            ]);
        }
    }
}
