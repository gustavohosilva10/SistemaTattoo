<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class bibliography extends Model
{
    protected $table = "bibliography";
    public $timestamps = false;
    public $fillable = [

        'img_profile',
        'name_perfil',
        'text_perfil',
    ];
}
