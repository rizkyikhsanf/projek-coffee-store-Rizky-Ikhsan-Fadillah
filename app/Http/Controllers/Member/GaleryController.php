<?php

namespace App\Http\Controllers\Member;

use App\Models\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GaleryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // fungsi search
        $search = $request->search;
        $data = Galery::where('user_id', $user->id)->where(function($query) use ($search) {
            //kondisi untuk fungsi cari
            if($search){
                $query->where('title', 'like', "%{$search}%");
            }

        })->orderBy('id', 'asc')->paginate(3)->withQueryString();
        return view('member.galleries.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'harga' => 'required|numeric',
        'image_path' => 'image|mimes:png,jpg,jpeg',
    ],[
        'title.required' => 'judul wajib diisi',
        'description' => 'deskripsi wajib diisi',
        'harga.required' => 'harga wajib diisi',
        'harga.numeric' => 'harga harus berupa angka',
        'image_path.image' => 'file hanya gambar',
        'image_path.mimes' => 'file yang didukung adalah png jpg jpeg',
    ]);

    // request image
    if($request->hasFile('image_path')) { 

        //menambahkan waktu pada nama file sehingga mencegah duplikat
        $image = $request->file('image_path');
        $image_name = time() ."_". $image->getClientOriginalName();
        $destination_path = public_path(getenv('CUSTOM_GALLERY_LOCATION'));
        $image->move($destination_path, $image_name);
    }

    $data=[
        'title' => $request->title,
        'description' => $request->description,
        'image_path' =>isset($image_name) ? $image_name : null,
        'harga' => $request->harga,
        'user_id' => Auth::user()->id 
    ];

    Galery::create($data);
    return redirect()->route('member.galleries.index')->with('success', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        $data = $galery;
        return view('member.galleries.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_path' => 'image|mimes:png,jpg,jpeg',
        ],[
            'title.required' => 'judul wajib diisi',
            'description.required' => 'deskripsi wajib diisi',
            'image_path.image' => 'file hanya gambar',
            'image_path.mimes' => 'file yang didukung adalah png jpg jpeg',

        ]);

        if($request->hasFile('image_path')) { 

            // kondisi pengecekan jika ada gambar 
            if(isset($galery->image_path) && file_exists(public_path(getenv('CUSTOM_GALLERY_LOCATION')) ."/". $galery->image_path)){
                
                // jika ada gambar maka hapus file lama
                unlink(public_path(getenv('CUSTOM_GALLERY_LOCATION'))."/". $galery->image_path);
            }

            //menambahkan waktu pada nama file sehingga mencegah duplikat
            $image = $request->file('image_path');
            $image_name = time() ."_". $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_GALLERY_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        $data=[
            'title' => $request->title,
            'description' => $request->description,
            'image_path' =>isset($image_name) ? $image_name : null,
            'harga' => $request->harga,
            'user_id' => Auth::user()->id ,
        ];

        Galery::where('id', $galery->id)->update($data);
        return redirect()->route('member.galleries.index')->with('success', 'galery berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        //
    }
}
