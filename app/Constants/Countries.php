<?php

namespace App\Constants;

abstract class Countries
{
    const DEFAULT_COUNTRY = 'NL';
    const LAST_COUNTRY_COOKIE = 'chosen_country';

    /**
     * Return a key-value list of all countries.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function all(): \Illuminate\Support\Collection
    {
        return collect(\Symfony\Component\Intl\Countries::getNames())->map(function ($item, $key) {
            return ['code' => $key, 'name' => $item];
        })->values();
    }
}
