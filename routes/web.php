<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\JobsController;
use App\Http\Middleware\Localization;
use App\Livewire\FAQ;
use App\View\Components\SendReceiver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');


Route::middleware(Localization::class)
    ->group(function () {
        Route::get('/lines/{lines:slug}', [LineController::class, 'show'])->name('lines.show');
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/timeline', [TimelineController::class, 'index'])->name('timelines.index');
        Route::get('/search', [HomeController::class, 'search'])->name('home.search');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
        Route::get('/products/{category?}/{childCategory?}/{childCategory2?}/{childCategory3?}/{productSlug}/{cod_prod}', [ProductController::class, 'product'])->name('product');
        Route::get('/products/{category:slug}/{childCategory:slug?}/{childCategory2:slug?}/{childCategory3?}', [ProductController::class, 'category'])->name('category');
        Route::get('/product/{slug}/{cod_prod}', [ProductController::class, 'show'])->name('products.show');

        Route::get('/faq', function () {
            return view('home.faq');
        })->name('faq');

        Route::get('/politicas-de-envio-e-entrega', function () {
            return view('home.send-receiver');
        })->name('send-receiver');

        Route::get('/troca-devolucoes', function () {
            return view('home.exchange-returns');
        })->name('exchange-return');

        Route::get('/bioclin-educar', function () {
            return view('home.educar');
        })->name('educar');

        Route::get('/calculos', function () {
            return view('home.calculations');
        })->name('calculos');

        Route::get('/relatorio-de-transparencia-salarial-e-de-criterios-remuneratorios', function () {
            return view('home.relatorio');
        })->name('relatorio');

        Route::get('/como-chegar', function () {
            return view('home.address');
        })->name('address');

        Route::get('/contatos', [EmailController::class, 'index'])->name('index-email');

        Route::post('/send', [EmailController::class, 'enviarEmail'])->name('send-email');

        Route::get('/set-cookie', function () {
            $cookie = cookie('privacy_accepted', true, 525600); // Name, Value, Minutes
            return response('Cookie has been set')->cookie($cookie);
        });

        Route::get('/list_directories', [DirectoryController::class, 'listDirectories'])->name('directories1');
        Route::get('/list_directories', [DirectoryController::class, 'index'])->name('directories');
        Route::get('/download-compactado', [DirectoryController::class, 'downloadCompactado']);
        Route::get('/certificates', [CertificateController::class, 'index'])->name('certificate');
        Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
        Route::get('/job/{id}', [JobsController::class, 'show'])->name('jobs.show');
        Route::post('/job/send', [JobsController::class, 'sendEmail'])->name('jobs.send-email');
    });


Route::get('/categories/transfer_data', [ProductCategoryController::class, 'transferDatas'])->name('categories.transfer_data');
Route::get('/transfer_data/products', [ProductController::class, 'transferDatas'])->name('products.transfer_data');
Route::get('/cat', [ProductController::class, 'insertProductAndCategoriesToProductCategory'])->name('cat');
//Route::get('/{any}', [RedirectionController::class, 'redirect'])->where('any', '.*');


