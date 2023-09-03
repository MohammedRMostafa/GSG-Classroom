<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ChangeLocaleController extends Controller
{
    public function __invoke(Request $request)
    {
        $locale = $request->input('locale');
        $langs = ['ar', 'en'];
        if (in_array($locale, $langs)) {
            $user = Auth::user();
            $user->update([
                'locale' => $locale,
            ]);
        }
        return redirect()->back();
    }
}
