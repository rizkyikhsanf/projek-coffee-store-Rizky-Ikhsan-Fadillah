<?php

namespace Database\Seeders;

use App\Models\Galery;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GalerySeeder extends Seeder
{   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'kopi hitam',
        ];
        foreach ($judul as $j) {
            $slug = Str::slug($j);
            //uniqe slug dengan menambahkan angka pada akhir slug
            $slugDuplikat = $slug;
            $count = 1;
            while(Galery::where('slug', $slug)->exists()) {
                $slug = $slugDuplikat."-".$count;
                $count++;
            }

            Galery::create([
                'title' => $j,
                'slug' => $slug,
                'description' => 'ini adalah deskripsi' . $j,
                'user_id' => '1',
            ]);
        }
    }
}
