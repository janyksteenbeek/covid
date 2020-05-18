<?php

namespace App\Http\Controllers;

use App\Constants\Countries;
use App\Constants\Countries as CountriesConstant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     */
    public function getIndex(Request $request)
    {
        $cookie = $request->cookie(Countries::LAST_COUNTRY_COOKIE) ?? CountriesConstant::DEFAULT_COUNTRY;

        return redirect()->route('country', ['code' => $cookie]);
    }
}
