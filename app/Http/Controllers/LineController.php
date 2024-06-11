<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($line)
    {
        if (app()->getLocale() != 'pt-br') {
            $lines = Line::with(['products' => function ($query) {
                $query->where('is_comex', true);
            }])
                ->where('slug', $line)
                ->where('is_active', true)
                ->first();

        } else {
            $lines = Line::with('products')->where('slug', $line)->where('is_active', true)->first();
        }

        if (!$line) {
            return abort(404);
        }

        return view('lines.index', compact('lines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Line $line)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Line $line)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Line $line)
    {
        //
    }
}
