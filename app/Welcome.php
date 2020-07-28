<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    protected $table = "welcome";
    public $timestamps = false;
    public $fillable = [

        'text_welcome_title',
        'text_welcome',

    ];
}
