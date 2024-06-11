<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($locale)
    {
        if (!in_array($locale, config('localization.locales'))){
            abort(400);
        }

        session(['localization' => $locale]);

        return redirect()->back();
    }
}
