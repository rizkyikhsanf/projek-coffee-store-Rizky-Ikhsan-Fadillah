<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = "galleries";

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'harga',
        'user_id',
    ];
}
