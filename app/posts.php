<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";
    public $timestamps = false;
    public $fillable = [

        'arquivo',
        'desciption_promotion',
    ];
}
