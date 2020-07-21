<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table = "photo";
    public $timestamps = false;
    public $fillable = [

        'base64_image',

    ];
}
