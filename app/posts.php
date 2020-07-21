<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";
    public $timestamps = false;
    public $fillable = [

        'base64_image_promotion',
        'desciption_promotion',
    ];
}
