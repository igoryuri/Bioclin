<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class AttachmentProgramming extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'file',
        'expiration_date',
        'programming_id'
    ];

    public function toSearchableArray()
    {
        return [
            'file' => $this->file
        ];
    }

    public function programming()
    {
        return $this->belongsTo(Programming::class);
    }
}
