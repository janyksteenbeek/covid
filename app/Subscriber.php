<?php

namespace App;

use App\Traits\EasyEncrypt;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    protected $hidden = ['id'];

    protected $dates = ['last_notified_at'];
}
