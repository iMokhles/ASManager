<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocalizeController extends Controller
{
    private $localKey = 'applocale';

    public function index(Request $request, $lang)
    {
        if (array_key_exists($lang, Config::get('langs'))) {
            Session::put($this->localKey, $lang);
        }
        return Redirect::back();

    }
}
