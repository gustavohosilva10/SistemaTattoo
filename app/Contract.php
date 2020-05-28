<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public $timestamps = false;
    public $fillable = ['text_contract'];


    public function withContact(){
        return $this->hasMany('TattooOpen\Session','first_name', 'middle_name', 'last_name', 'avatar', 'birthday', 'gender', 'email', 'phone1',
        'phone2', 'zip_code', 'address', 'complement', 'strict', 'city', 'state', 'number', 'register',);
    }

}
