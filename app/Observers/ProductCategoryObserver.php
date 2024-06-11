<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryObserver
{
    public function saving(ProductCategory $model)
    {
        $model->slug = Str::slug($model->name);
    }
}
