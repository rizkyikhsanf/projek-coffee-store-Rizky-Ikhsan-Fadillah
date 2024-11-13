<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model User
        $users = User::all();

        // Mengirim data ke view (misalnya, dashboard.blade.php)
        return view('dashboard', compact('users'));
    } 
}