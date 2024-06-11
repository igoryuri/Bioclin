<?php

namespace App\Livewire;

use App\Models\ProductCategory;
use Livewire\Attributes\Url;
use Livewire\Component;
use function Laravel\Prompts\select;

class SelectFilterHome extends Component
{
    public $parentCategories, $childCategories, $childChildCategories;
    public $parentSlug, $childSlug, $childChildSlug;

    public $selectedParentCategory, $selectedChildCategory, $selectedChildChildCategory = null;


    public function mount()
    {
        $this->parentCategories = ProductCategory::query()->whereNull('category_id')->get();
    }

    public function render()
    {
        return view('livewire.select-filter-home');
    }

    public function updatedSelectedParentCategory($parentCategory)
    {
        $this->childCategories = ProductCategory::query()->where('category_id', $parentCategory)->where('step', '=', 2)->get();

//        dd($this->parentCategories->where('id', $parentCategory)->first()->slug);

        if ($parentCategory) {
            $this->parentSlug = ProductCategory::query()->findOrFail($parentCategory);
        }
        $this->selectedChildCategory = null;
    }

    public function updatedSelectedChildCategory($childCategory)
    {

        $this->childChildCategories = ProductCategory::query()->where('category_id', '=', $childCategory)->where('step', '=', 3)->get();
        if ($childCategory) {
            $this->childSlug = ProductCategory::query()->findOrFail($childCategory);
        }
        $this->selectedChildChildCategory = null;
    }

    public function updatedSelectedChildChildCategory($childChildCategory)
    {
        if ($childChildCategory) {
            $this->childChildSlug = ProductCategory::query()->findOrFail($childChildCategory);
        }
    }

    #[Url]
    public function save()
    {
        $this->redirect(route('category', [$this->parentSlug, $this->childSlug, $this->childChildSlug]));
    }
}
