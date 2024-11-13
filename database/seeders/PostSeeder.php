<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $judul = [
            'institut teknologi bandung',
        ];

        foreach ($judul as $j) {
            $slug = Str::slug($j);
            //uniqe slug dengan menambahkan angka pada akhir slug
            $slugDuplikat = $slug;
            $count = 1;
            while(Post::where('slug', $slug)->exists()) {
                $slug = $slugDuplikat."-".$count;
                $count++;
            }


            Post::create([
                'title' => $j,
                'slug' => $slug,
                'description' => 'ini adalah deskripsi' . $j,
                'content' => 'ini adalah content' . $j,
                'status' => 'publish',
                'user_id' => '1'
            ]);
        }
    }
}
