<?php

namespace App;

use App\Traits\EasyEncrypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = ['id'];

    protected $dates = ['last_notified_at'];
}
