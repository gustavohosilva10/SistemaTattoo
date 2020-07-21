<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Pageprincipals extends Model
{
    protected $table = "Pageprincipals";
    public $timestamps = false;
    public $fillable = [

        'text_welcome_title',
        'text_welcome',
        'base64_img_profile',
        'name_perfil',
        'text_perfil',

    ];
}
