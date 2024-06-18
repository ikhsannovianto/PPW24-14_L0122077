<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ClubFactory extends Factory
{
    protected $model = Club::class;

    public function definition()
    {
        // Menghasilkan data fake untuk atribut klub
        $nama = $this->faker->company;
        $kota = $this->faker->city;
        $negara = $this->faker->country;
        $tahun_berdiri = $this->faker->year();
        $stadion = $this->faker->streetName;
        $pelatih = $this->faker->name;

        // Menghasilkan data fake untuk file logo
        $logoFileName = $this->faker->image('public/storage/logos', 100, 100, null, false);
        $logoFilePath = 'logos/' . $logoFileName;

        // Simpan file logo ke storage dan dapatkan nama filenya
        $logo = Storage::url($logoFilePath);

        return [
            'nama' => $nama,
            'kota' => $kota,
            'negara' => $negara,
            'tahun_berdiri' => $tahun_berdiri,
            'stadion' => $stadion,
            'pelatih' => $pelatih,
            'logo' => $logoFileName, // Simpan nama file logo ke dalam kolom logo
        ];
    }
}
