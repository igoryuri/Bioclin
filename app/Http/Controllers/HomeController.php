<?php

namespace App\Http\Controllers;

use App\Models\AttachmentProgramming;
use App\Models\Hero;
use App\Models\Line;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Programming;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(Request $request)
    {
//        $categories = ProductCategory::with('parentCategory.childCategories')
//            ->paginate(10);

        if (app()->getLocale() != 'pt-br') {
            $lines = Line::where('is_active', true)->where('is_comex', true)->get();
        } else {
            $lines = Line::where('is_active', true)->get();
        }

        $services = Service::all();
        $heros = Hero::where('is_active', true)->get();
        $partners = Partner::where('is_active', true)->get();

        return view('welcome', compact('lines', 'services', 'heros', 'partners'));
    }

    public function search(Request $request)
    {

//        $products_query = Product::query();
//        $lines_query = Product::query();

        $search_param = $request->query('search');

        if ($search_param) {
            $products_query = Product::search($search_param)
                ->query(function ($builder) {
                    $builder->with('categories.parentCategory.parentCategory')
                        ->where('is_active', true)
                        ->whereHas('categories.parentCategory.parentCategory.parentCategory');
                })
                ->paginate(20);

            $lines_query = Line::search($search_param)->get();
            $services_query = Service::search($search_param)->get();
            $attachmentProgrammings_query = AttachmentProgramming::search($search_param)
                ->query(fn (Builder $query) => $query->with('programming'))
                ->get();
            ds($attachmentProgrammings_query);


//            dd($services_query->count(), $products_query, $lines_query);

            return view('search.index', compact('products_query', 'search_param',
                'lines_query', 'services_query', 'attachmentProgrammings_query'));
        }

        return redirect()->back();
    }

}
