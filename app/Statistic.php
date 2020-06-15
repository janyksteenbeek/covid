<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'date',
        'country_code',
        'new_cases',
        'new_deaths',
        'total_cases',
        'total_recoveries',
        'total_deaths',
    ];

    protected $dates = [
        'date'
    ];
}
