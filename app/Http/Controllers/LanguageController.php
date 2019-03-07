<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Config;

class LanguageController extends Controller
{
    public function __invoke($language){
        if(in_array($language, Config::get('app.locales'))){
            Session::put('language', $language);
        }

        return back();
    }
}
