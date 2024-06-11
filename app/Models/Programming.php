<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Programming extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'is_active'
    ];

    protected $casts = [
      'is_active' => 'boolean',
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function attachmentProgrammings()
    {
        return $this->hasMany(AttachmentProgramming::class);
    }

}
