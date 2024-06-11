<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Info extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'product_id',
        'name',
        'description',
        'is_active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
