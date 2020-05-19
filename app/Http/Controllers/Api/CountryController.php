<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Statistic;
use Symfony\Component\Intl\Countries;

class CountryController extends Controller
{
    public function getCountry($countyCode)
    {
        $countyCode = strtoupper($countyCode);

        $data = Statistic::where('country_code', strtoupper($countyCode))->get();
        return [
            'country' => [
                'code' => $countyCode,
                'name' => Countries::getName($countyCode)
            ],
            'statistics' => [
                'latest' => $data->sortByDesc('date')->first(),
                'all' => $data,
            ]
        ];
    }
}
