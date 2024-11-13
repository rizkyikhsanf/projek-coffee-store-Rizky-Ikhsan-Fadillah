<?php

namespace App\Http\Controllers\Member;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // fungsi search
        $search = $request->search;
        $data = Post::where('user_id', $user->id)->where(function($query) use ($search) {
            //kondisi untuk fungsi cari
            if($search){
                $query->where('title', 'like', "%{$search}%")->orWhere('content', 'like', "%{$search}%");
            }

        })->orderBy('id', 'asc')->paginate(5)->withQueryString();
        return view('member.blogs.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validasi data
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'thumbnail' => 'image|mimes:png,jpg,jpeg|',
    ],[
        'title.required' => 'judul wajib diisi',
        'content.required' => ' wajib diisi',
        'thumbnail.image' => 'file hanya gambar',
        'thumbnail.mimes' => 'file yang didukung adalah png jpg jpeg',
    ]);

    $content = strip_tags($request->input('content'));
    // request image
    if($request->hasFile('thumbnail')) { 

        //menambahkan waktu pada nama file sehingga mencegah duplikat
        $image = $request->file('thumbnail');
        $image_name = time() ."_". $image->getClientOriginalName();
        $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
        $image->move($destination_path, $image_name);
    }

    $data=[
        'title' => $request->title,
        'description' => $request->description,
        'content' => strip_tags($request->input('content')),
        'status' => $request->status,
        'thumbnail' =>isset($image_name) ? $image_name : null,
        'slug' => $this->generateslug($request->title),
        'user_id' => Auth::user()->id 
    ];

    Post::create($data);
    return redirect()->route('member.blogs.index')->with('success', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $data = $post;
        return view('member.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg',
        ],[
            'title.required' => 'judul wajib diisi',
            'content.required' => ' wajib diisi',
            'thumbnail.image' => 'file hanya gambar',
            'thumbnail.mimes' => 'file yang didukung adalah png jpg jpeg',
        ]);

        // request image
        if($request->hasFile('thumbnail')) { 

            // kondisi pengecekan jika ada gambar 
            if(isset($post->thumbnail) && file_exists(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')) ."/". $post->thumbnail)){
                
                // jika ada gambar maka hapus file lama
                unlink(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'))."/". $post->thumbnail);
            }

            //menambahkan waktu pada nama file sehingga mencegah duplikat
            $image = $request->file('thumbnail');
            $image_name = time() ."_". $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destination_path, $image_name);
        }


        $data=[
            'title' => $request->title,
            'description' => $request->description,
            'content' => strip_tags($request->input('content')),
            'status' => $request->status,
            'thumbnail' =>isset($image_name) ? $image_name : $post->thumbnail,
            'slug' => $this->generateslug($request->title, $post->id),
        ];

        Post::where('id', $post->id)->update($data);
        return redirect()->route('member.blogs.index')->with('success', 'data berhasil di update');
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(isset($post->thumbnail) && file_exists(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')) ."/". $post->thumbnail)){
                
            // jika ada gambar maka hapus file lama
            unlink(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'))."/". $post->thumbnail);
        }

        Post::where('id', $post->id)->delete();
        // kembalikan ke halam utama
        return redirect()->route('member.blogs.index')->with('success', 'Data berhasil di hapus');
    }

    // slug
    private function generateslug($title, $id=null) {
        $slug = Str::slug($title);
        $count = Post::where('slug', $slug)->when($id, function($query, $id){
            return $query->where('id', '!=', $id);
        })->count();

        if($count > 0) {
            $slug = $slug . "-" . ($count + 1); 
        }
        return $slug; 
    }
}
