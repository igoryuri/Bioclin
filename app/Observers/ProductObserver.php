<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function saving(Product $model)
    {
        $translations = $model->getTranslations('name');

        foreach ($translations as $locale => $translation){

            $model->setTranslation('slug', $locale, Str::slug($translation));

        }

//        $model->slug = Str::slug($model->name);
    }
}
