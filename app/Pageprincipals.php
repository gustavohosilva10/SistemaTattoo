<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Pageprincipals extends Model
{
    public $fillable = [
    'id',
    'text_perfil',
    'base64_photo_perfil',
    'base64_photo_principal',
    'base64_photo',
    'text_welcome_title',
     'base64_photo_coments1',
     'base64_photo_coments2'
     ];
}