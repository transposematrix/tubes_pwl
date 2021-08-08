<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kategori;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = new kategori;
        $kategori->nama = "Ketentuan";
        $kategori->save();


    }
}
