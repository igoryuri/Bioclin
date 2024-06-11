<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\ProductProductCategory;
use Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class cat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $highestCategories = DB::table('product_product_category as ppc1')
//            ->select('ppc1.product_id', DB::raw('MAX(ppc2.product_category_id) as highest_product_category_id'))
//            ->leftJoin('product_product_category as ppc2', 'ppc1.product_id', '=', 'ppc2.product_id')
//            ->whereNotNull('ppc2.product_category_id') // Garantir que estamos considerando apenas categorias não nulas
//            ->groupBy('ppc1.product_id');
//
//// Consulta principal para obter os produtos com suas categorias mais altas
//        $products = Product::query()
//            ->joinSub($highestCategories, 'highest_categories', function ($join) {
//                $join->on('products.id', '=', 'highest_categories.product_id');
//            })
//            ->select('products.id', 'highest_categories.highest_product_category_id as product_category_id')
//            ->get();
//
//        foreach ($products as $product) {
//
//            Product::query()->where('id', $product->id)
//                ->update(['category_cat_id' => $product->product_category_id]);
//
//            ds('Produto '.$product->id.' categoria '.$product->product_category_id.' atualizado');
//        }
    }
}
