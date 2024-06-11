<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type_attachment_id',
        'name',
        'register',
        'expiration_date',
        'file',
    ];

    public function type_attachment()
    {
        return $this->belongsTo(TypeAttachment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
