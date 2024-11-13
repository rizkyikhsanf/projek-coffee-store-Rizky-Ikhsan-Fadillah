<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Galery;

class WelcomeController extends Controller
{
    public function index()
    {
        // Memanggil semua data dari model Post dan Gallery
        $posts = Post::all();
        $galleries = Galery::all();

        // Mengirim data ke view (misalnya, welcome.blade.php)
        return view('welcome', compact('posts', 'galleries'));
    }
}
