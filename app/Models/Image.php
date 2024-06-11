<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'file',
        'highlights',
        'path',
    ];

    protected $casts = [
      'file' => 'array',
    ];

//    public function product()
//    {
//        return $this->belongsTo(Product::class);
//    }
}
