<?php

namespace App\Constants;

use App\Exceptions\Api\EndpointNotFoundException;

abstract class Api
{
    const BASE_URL = 'https://thevirustracker.com/free-api?countryTimeline=';

    public static function url($country)
    {
        return self::BASE_URL . 'NL';
        return self::BASE_URL . strtoupper($country);
    }
}
