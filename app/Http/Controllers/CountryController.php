<?php

namespace App\Http\Controllers;

use App\Constants\Countries as CountriesConstant;
use Illuminate\Http\Response;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Exception\MissingResourceException;

class CountryController extends Controller
{
    /**
     * @param string $countryCode
     * @return Response
     */
    public function getIndex(string $countryCode): Response
    {
        $cookie = cookie(CountriesConstant::LAST_COUNTRY_COOKIE, $countryCode, 7 * 24 * 60);

        try {
            $country = Countries::getName($countryCode);
        } catch (MissingResourceException $exception) {
            logger()->info("[COVID tracker] Missing country: {$countryCode}");
            abort(404);
        }

        return response()->view('pages.countries.index', compact('country', 'countryCode'))->cookie($cookie);
    }
}
