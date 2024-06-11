<?php

namespace App\Http\View\Composers;

use App\Models\ProductCategory;
use Illuminate\View\View;

class FrontPageComposer
{
    private $frontCategories;

    public function __construct()
    {
        $this->frontCategories = cache()->remember('frontCategories', 3600, function () {
            return ProductCategory::whereNull('category_id')->where('is_active', true)
                ->with(['childCategories.childCategories' => function ($query) {
                    $query->withCount('products')->where('is_active', true);
                }, 'childCategories.products'])
                ->get();
        });
//        dd($this->frontCategories);
        foreach ($this->frontCategories as $parentCategory) {
            foreach($parentCategory->childCategories as $category) {
                $category->products_count = $category->childCategories->sum('products_count');
            }
            $parentCategory->products_count = $parentCategory->childCategories->sum('products_count');
        }
    }

    public function compose(View $view)
    {
        $view->with('frontCategories', $this->frontCategories);
    }
}
