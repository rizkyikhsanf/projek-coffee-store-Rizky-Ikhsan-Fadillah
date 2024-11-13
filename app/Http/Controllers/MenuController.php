<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Memanggil semua data dari model Post dan Gallery
        $galleries = Galery::all();

        // Mengirim data ke view (misalnya, welcome.blade.php)
        return view('user.menu', compact('galleries'));
    }
}
