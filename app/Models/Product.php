<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, Searchable, HasTranslations;

    public $translatable = ['name', 'info'];
//    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'category_cat_id',
        'sankhya_cat_id',
        'type_product_id',
        'cod_prod',
        'sku_id',
        'name',
        'images',
        'price_brl',
        'price_usd',
        'weight',
        'slug',
        'stock',
        'info',
        'is_active',
        'is_comex',
        'related_products',
        'meta_description'
    ];

    protected $casts = [
        'name' => 'json',
        'is_comex' => 'boolean',
        'is_active' => 'boolean',
        'images' => 'array',
        'related_products' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($product) {

            // Verifica se o produto tem categorias associadas
            if ($product->categories()->exists()) {
                $categories = $product->categories()->get();

                // Para cada categoria associada, vamos encontrar todas as categorias pai
                foreach ($categories as $category) {
                    $parentCategories = $category->getParentsAttribute();

                    // Associar o produto a todas as categorias pai encontradas,
                    // na ordem do filho ao pai
                    $parentCategories->each(function ($parentCategory) use ($product) {
                        $product->categories()->attach($parentCategory->id);
                    });
                }
            } else {
                // Se não houver categorias associadas, insira um registro com category_id null
                $product->categories()->attach(null);
            }

        });
    }

    public function toSearchableArray()
    {
        return [
            'cod_prod' => $this->cod_prod,
            'sku_id' => $this->sku_id,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }

    public function lines()
    {
        return $this->belongsToMany(Line::class, 'product_line');
    }

    public function convert_gr_kg($weight)
    {
        $total = number_format($weight, 2, ',', '.');
        return $total;
    }

    public function type_product()
    {
        return $this->belongsTo(TypeProduct::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

}
