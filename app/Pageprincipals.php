<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Pageprincipals extends Model
{
    protected $table = "Pageprincipals";
    public $timestamps = false;
    public $fillable = [

        'base64_photo_principal',
        'text_welcome_title',
        'text_welcome',
        'base64_image1',
        'base64_image2',
        'base64_image3',
        'base64_image4',
        'base64_image5',
        'base64_image6',
        'base64_image7',
        'base64_image8',
        'base64_image9',
        'base64_image10',
        'base64_image11',
        'base64_image12',
        'base64_image13',
        'base64_image14',
        'base64_image15',
        'base64_photo_perfil',
        'name_perfil',
        'text_perfil',
        'base64_promocao1',
        'description1',
        'base64_promocao2',
        'description2',
        'base64_promocao3',
        'description3',
        'question1',
        'answer1',
        'question2',
        'answer2',
        'question3',
        'answer3',

     ];
}