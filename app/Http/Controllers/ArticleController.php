<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // Memanggil semua data dari model Post dan Gallery
        $posts = Post::all();

        // Mengirim data ke view (misalnya, welcome.blade.php)
        return view('user.article', compact('posts'));
    }
}
