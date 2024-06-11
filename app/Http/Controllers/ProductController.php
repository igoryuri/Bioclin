<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductProductCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
//        if (app()->getLocale() != 'pt-br') {
//            $products = Product::with('categories.parentCategory.parentCategory.parentCategory')
//                ->where('is_comex', true)
//                ->paginate(20);
//
//            return view('products.index', compact('products'));
//        }
        if (app()->getLocale() !== 'pt-br') {
            $products = Product::with('categories.parentCategory.parentCategory.parentCategory')
                ->where('is_comex', true)
                ->where('is_active', true)
                ->paginate(10);
        } else {
            $products = Product::with('categories.parentCategory.parentCategory.parentCategory')
                ->where('is_active', true)
                ->paginate(10);
        }

        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $products = Product::with('categories.parentCategory.parentCategory.parentCategory')
            ->where('is_active', true)
            ->whereHas('categories.parentCategory.parentCategory.parentCategory')
            ->where(function ($query) use ($search) {
                $query->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('cod_prod', 'LIKE', '%' . $search . '%')
                    ->orWhere('sku_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('slug', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);

        ds($products);

        return view('products.index', compact('products'));
    }

    public function category(ProductCategory $category, ProductCategory $childCategory = null, $childCategory2 = null, $childCategory3 = null)
    {
        $products = null;
        $ids = collect();
        $selectedCategories = [];

        if ($childCategory3) {
            $subCategory = $childCategory->where('slug', $childCategory3)->firstOrFail();
            $ids = collect($subCategory->id);
            $selectedCategories = [$category->id, $childCategory->id, $subCategory->id];
        } elseif ($childCategory2) {
            $subCategory = $childCategory->childCategories()->where('slug', $childCategory2)->firstOrFail();
            $ids = collect($subCategory->id);
            $selectedCategories = [$category->id, $childCategory->id, $subCategory->id];
        } elseif ($childCategory) {
            $ids = $childCategory->childCategories->pluck('id');
            $selectedCategories = [$category->id, $childCategory->id];
        } elseif ($category) {
            $category->load('childCategories.childCategories');
            $ids = collect();
            $selectedCategories[] = $category->id;


            foreach ($category->childCategories as $subCategory) {
                $ids = $ids->merge($subCategory->childCategories->pluck('id'));
            }
        }

//        if (app()->getLocale() != 'pt-br') {
//            $products = Product::whereHas('categories', function ($query) use ($ids) {
//                $query->whereIn('id', $ids);
//            })
//                ->where('is_comex', true)
//                ->with('categories.parentCategory.parentCategory.parentCategory', 'images')
//                ->paginate(20);
//            return view('products.index', compact('products', 'selectedCategories'));
//        }

        if (app()->getLocale() !== 'pt-br') {
            $products = Product::whereHas('categories', function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            })
                ->where('is_comex', true)
                ->where('is_active', true)
                ->with('categories.parentCategory.parentCategory.parentCategory')
                ->paginate(10);
        } else {
            $products = Product::whereHas('categories', function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            })
                ->with('categories.parentCategory.parentCategory.parentCategory')
                ->where('is_active', true)
                ->paginate(10);
        }


        return view('products.index', compact('products', 'selectedCategories'));
    }

    public function product($category, $childCategory, $childCategory2, $childCategory3, $productSlug, $cod_prod)
    {
        $today = Carbon::today();

        $product = Product::query()
            ->where('cod_prod', $cod_prod)
            ->with('descriptions')
            ->with('attachments', function ($query) use ($today) {
                $query->where('expiration_date', '>=', $today);
            })->first();


        if (!empty($product->descriptions[0])) {
            $first_desc = $product->descriptions[0];
        } else {
            $first_desc = ' ';
        }

        $product->load('categories.parentCategory.parentCategory.parentCategory');
        $childCategory2 = $product->categories->where('slug', $childCategory3)->first();
        $selectedCategories = [];
        ds($childCategory2);

        if ($childCategory2 &&
            $childCategory2->parentCategory &&
            $childCategory2->parentCategory->parentCategory &&
            $childCategory2->parentCategory->parentCategory->parentCategory
        ) {
            $selectedCategories = [
                $childCategory2->parentCategory->parentCategory->parentCategory->id ?? null,
                $childCategory2->parentCategory->parentCategory->id ?? null,
                $childCategory2->parentCategory->id ?? null,
                $childCategory2->id
            ];
        }

        $related_products = Product::whereIn('id', $product['related_products'])->get();


        return view('products.show', compact('product', 'selectedCategories', 'first_desc', 'related_products'));
    }

    public function show($slug, $cod_prod)
    {
        $today = Carbon::today();
        $product = Product::where('cod_prod', $cod_prod)
            ->with('descriptions')
            ->with('categories')
            ->with('attachments', function ($query) use ($today) {
                $query->where('expiration_date', '>=', $today);
            })->first();

        foreach ($product->categories as $prodCat){
            if ($prodCat->pivot['product_id'] === $product->id && $prodCat->step === 4){
                $childCategory3 = $prodCat;
            }
        }

        $product->load('categories.parentCategory.parentCategory.parentCategory');
        $childCategory2 = $product->categories->where('slug', $childCategory3->slug)->first();

//        $related_products = Product::whereIn('id', $product['related_products'])->get();

//        ds($related_products);

        return redirect()->route('product', [
            $childCategory2->parentCategory->parentCategory->parentCategory->slug,
            $childCategory2->parentCategory->parentCategory->slug,
            $childCategory2->parentCategory->slug,
            $childCategory2->slug,
            $slug,
            $cod_prod
        ]);


//        return view('products.show', compact('product', 'selectedCategories', 'first_desc', 'related_products'));

//        if ($slug === Str::slug($product->name)) {
//            return view('products.show')->with('product', $product);
//        } else {
//            abort(404);
//        }
    }

    public function transferDatas()
    {
        $datasSQLServer = DB::connection('sqlsrv')->select("SELECT RTRIM(PRO.REFERENCIA) SKU,				-- 0
	COM1.CODARV,							-- 1
	PRO.CODPROD,							-- 2
	RTRIM(PRO.DESCRPROD) NOME,	-- 3
	RTRIM(ISNULL(PRO.AD_DESCRICAO_EN, '')) + RTRIM(ISNULL(PRO.AD_APRESENTACAO, '')) NOMEEN,	-- 4
	RTRIM(ISNULL(PRO.AD_DESCRICAO_ES, '')) + RTRIM(ISNULL(PRO.AD_APRESENTACAO, '')) NOMEES,	-- 5
	SANKHYA.AD_BUSCA_PRECO(0,PRO.CODPROD) PRECO_REAL,	-- 6
	SANKHYA.AD_BUSCA_PRECO(133,PRO.CODPROD) PRECO_USD,	-- 7
	PRO.PESOBRUTO,							-- 8
	(SELECT SUM(ESTOQUE - RESERVADO) FROM TGFEST WITH (NOLOCK) WHERE CODPROD = PRO.CODPROD AND CODEMP = 1) ESTOQUE,	-- 9
	COM1.DESCRICAOCUR,						-- 10
	ISNULL(COM0.DESCRICAODET,COM1.DESCRICAOLON) DESCRICAODETDESCRICAODET,	-- 11
	COM1.DESCRICAOCUREN,					-- 12
	ISNULL(COM0.DESCRICAODETEN,COM1.DESCRICAOLONEN) DESCRICAODETENDESCRICAODETEN,	-- 13
	COM1.DESCRICAOCURES,					-- 14
	ISNULL(COM0.DESCRICAODETES,COM1.DESCRICAOLONES) DESCRICAODETESDESCRICAODETES,	-- 15
	COM0.CATEGADIC,							-- 16
	PRO.IMAGEM,								-- 17
	COM0.DESCRICAOANEXOS					-- 18
FROM TGFPRO PRO WITH (NOLOCK)
	INNER JOIN AD_ARVOREECOMPRO COM0 WITH (NOLOCK) ON COM0.CODPROD = PRO.CODPROD
	INNER JOIN AD_ARVOREECOM COM1 WITH (NOLOCK) ON COM1.CODARV = COM0.CODARV
WHERE COM1.IDCATEGECOMMERCE IS NOT NULL
	AND PRO.REFERENCIA IS NOT NULL
	AND PRO.AD_VAIECOM = 'S'
	AND PRO.ATIVO = 'S'
	AND (
		(COM1.DESCRICAOCUR IS NOT NULL AND (COM0.DESCRICAODET IS NOT NULL OR COM1.DESCRICAOLON IS NOT NULL) AND SANKHYA.AD_BUSCA_PRECO(0,PRO.CODPROD) > 0) OR
		(SANKHYA.AD_BUSCA_PRECO(133,PRO.CODPROD) > 0 AND
			(COM1.DESCRICAOCUREN IS NOT NULL AND (COM0.DESCRICAODETEN IS NOT NULL OR COM1.DESCRICAOLONEN IS NOT NULL) AND PRO.AD_DESCRICAO_EN IS NOT NULL) OR
			(COM1.DESCRICAOCURES IS NOT NULL AND (COM0.DESCRICAODETES IS NOT NULL OR COM1.DESCRICAOLONES IS NOT NULL) AND PRO.AD_DESCRICAO_ES IS NOT NULL)
		)
	)
ORDER BY PRO.CODPROD");

        $count = 0;
        foreach ($datasSQLServer as $dataSQLServer) {
//            dd($dataSQLServer);

            $slug = Str::slug($dataSQLServer->NOME,);
            $desc_format = mb_strtolower($dataSQLServer->NOME);
            $desc_format_es = mb_strtolower($dataSQLServer->NOMEES);
            $desc_format_en = mb_strtolower($dataSQLServer->NOMEEN);
            $desc = mb_strtolower($dataSQLServer->DESCRICAODETDESCRICAODET);
            $desc_es = mb_strtolower($dataSQLServer->DESCRICAODETENDESCRICAODETEN);
            $desc_en = mb_strtolower($dataSQLServer->DESCRICAODETESDESCRICAODETES);

            $name = [
                'pt-br' => $desc_format,
                'es' => $desc_format_es,
                'en' => $desc_format_en,
            ];
            $description = [
                'pt-br' => $desc,
                'es' => $desc_es,
                'en' => $desc_en,
            ];

            $desc_enc = json_encode($description);
            $name_enc = json_encode($name);


            $product = Product::firstOrNew(
                ['cod_prod' => $dataSQLServer->CODPROD],
                [
                    'sankhya_cat_id' => $dataSQLServer->CODARV,
                    'category_cat_id' => null,
                    'cod_prod' => $dataSQLServer->CODPROD,
                    'sku_id' => $dataSQLServer->SKU,
                    'name' => $name_enc,
                    'price_brl' => $dataSQLServer->PRECO_REAL,
                    'price_usd' => $dataSQLServer->PRECO_USD,
                    'weight' => $dataSQLServer->PESOBRUTO,
                    'slug' => $slug,
                    'info' => $name_enc,
                    'stock' => $dataSQLServer->ESTOQUE,
                    'is_active' => true,
                    'is_comex' => true,
                    'related_products' => '[1]',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]
            );
            $product->save();
            $count = $count + 1;

//            DB::connection('mysql')->table('products')->insert([
//                'sankhya_cat_id' => $dataSQLServer->CODARV,
//                'category_cat_id' => 10,
//                'cod_prod' => $dataSQLServer->CODPROD,
//                'sku_id' => $dataSQLServer->SKU,
//                'name' => $name_enc,
//                'price_brl' => $dataSQLServer->PRECO_REAL,
//                'price_usd' => $dataSQLServer->PRECO_USD,
//                'weight' => $dataSQLServer->PESOBRUTO,
//                'slug' => $slug,
//                'info' => $name_enc,
//                'stock' => $dataSQLServer->ESTOQUE,
//                'is_active' => true,
//                'is_comex' => true,
//                'related_products' => '[1]',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//            ]);


//            $product = Product::all()->last();
//
//            DB::connection('mysql')->table('descriptions')->insert([
//                'product_id' => $product->id,
//                'name' => $name_enc,
//                'description' => $desc_enc,
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//            ]);
//
//            echo $dataSQLServer->SKU;
//            echo "<br>";
            sleep(1);
        }
        return "Dados transferidos com sucesso!";

    }

//    public function insertProductAndCategoriesToProductCategory()
//    {
//        $products = Product::all();
//
//        foreach ($products as $product) {
//            // Obter a categoria do produto
//            $category = $product->category_cat_id;
//
//            // Inserir a categoria principal na tabela product_product_category
//
//            $checkProduct = ProductProductCategory::where('product_id', $product->id)->exists();
//            $checkCategory = ProductProductCategory::where('product_category_id', $category)->exists();
//
//            echo $product->id . ' - Nome:' . $product->name . ' - Categoria ' . $category;
//            echo "-----------      produto" . $checkProduct . " - categoria" . $checkCategory . '</br>';
//
//            if (!$checkProduct) {
//                echo "--------------------Gerando relacionamento...";
//                echo $product->id . ' - Nome:' . $product->name . ' - Categoria ' . $category;
//                echo "-----------      produto" . $checkProduct . " - categoria" . $checkCategory . '</br>';
//
//                $productProductCategory = new ProductProductCategory();
//                $productProductCategory->product_id = $product->id;
//                $productProductCategory->product_category_id = $category;
////                dd($productProductCategory);
//                $productProductCategory->save();
//                $parentCategory = ProductCategory::find($category);
//
//                // Se houver uma categoria pai, também inserir na tabela product_product_category
//                if ($parentCategory->category_id) {
//
//                    $productProductCategory = new ProductProductCategory();
//                    $productProductCategory->product_id = $product->id;
//                    $productProductCategory->product_category_id = $parentCategory->category_id;
//                    $productProductCategory->save();
//
//                    $parentCategory1 = ProductCategory::find($parentCategory->category_id);
//                }
//                if ($parentCategory1->category_id) {
//                    $productProductCategory1 = new ProductProductCategory();
//                    $productProductCategory1->product_id = $product->id;
//                    $productProductCategory1->product_category_id = $parentCategory1->category_id;
//                    $productProductCategory1->save();
//
//                    $parentCategory2 = ProductCategory::find($parentCategory1->category_id);
//                }
//                if ($parentCategory2->category_id) {
//                    $productProductCategory1 = new ProductProductCategory();
//                    $productProductCategory1->product_id = $product->id;
//                    $productProductCategory1->product_category_id = $parentCategory2->category_id;
//                    $productProductCategory1->save();
//
//                    $parentCategory3 = ProductCategory::find($parentCategory2->category_id);
//                }
//                if ($parentCategory3->category_id === null) {
//
//                    $productProductCategory1 = new ProductProductCategory();
//                    $productProductCategory1->product_id = $product->id;
//                    $productProductCategory1->product_category_id = null;
//                    $productProductCategory1->save();
//
////                dd($parentCategory3->category_id);
//
//                }
//            }
//        }
//
//        sleep(10);
//        return redirect()->back();
//    }

}
