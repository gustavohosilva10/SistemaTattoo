<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = "photos";
    public $timestamps = false;
    public $fillable = [

        'photos_page',

    ];
}
