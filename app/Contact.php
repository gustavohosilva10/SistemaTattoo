<?php

namespace TattooOpen;

use TattooOpen\Presenters\ContactPresenter;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use PresentableTrait;

    protected $presenter = ContactPresenter::class;
    public $timestamps = false;
    public $fillable = [
        'first_name', 'middle_name', 'last_name', 'avatar', 'birthday', 'gender', 'email', 'phone1',
        'phone2', 'zip_code', 'address', 'complement', 'strict', 'city', 'state', 'number', 'register',
        'agree'
    ];
    protected $dates = ['birthday', 'register'];

    // Relationships
    public function anamnesis()
    {
        return $this->hasMany('TattooOpen\Anamnesi');
    }

    public function tattoos()
    {
        return $this->hasMany('TattooOpen\Tattoo');
    }

    public function sessions()
    {
        return $this->hasMany('TattooOpen\Session');
    }

    // setMutators
    public function setFirstNameAttribute($value)
    {
        return $this->attributes['first_name'] = $this->formatText($value);
    }

    public function setMiddleNameAttribute($value)
    {
        return $this->attributes['middle_name'] = $this->formatText($value);
    }

    public function setLastNameAttribute($value)
    {
        return $this->attributes['last_name'] = $this->formatText($value);
    }

    public function setBirthdayAttribute($value)
    {
        return $this->attributes['birthday'] = $this->isValidDate($value);
    }

    public function setGenderAttribute($value)
    {
        return $this->attributes['gender'] = ucfirst(trim($value));
    }

    public function setEmailAttribute($value)
    {
        return $this->attributes['email'] = strtolower(trim($value));
    }

    public function setPhone1Attribute($value)
    {
        return $this->attributes['phone1'] = $this->formatPhone($value);
    }

    public function setPhone2Attribute($value)
    {
        return $this->attributes['phone2'] = $this->formatPhone($value);
    }

    public function setAddressAttribute($value)
    {
        return $this->attributes['address'] = $this->formatText($value);
    }

    public function setStrictAttribute($value)
    {
        return $this->attributes['strict'] = $this->formatText($value);
    }

    public function setCityAttribute($value)
    {
        return $this->attributes['city'] = $this->formatText($value);
    }

    public function setStateAttribute($value)
    {
        return $this->attributes['state'] = $this->formatText($value);
    }

    // Helpers
    private function formatText(string $value = null)
    {
        $value = ucwords(strtolower(trim($value)));
        return $value;
    }

    private function formatPhone(string $value = null)
    {
        $value = preg_replace('/\D/', '', trim($value));
        return $value;
    }

    private function isValidDate($value)
    {
        $checkDate = preg_match("/^(\d{4})-(\d{1,2})-(\d{1,2})$/", $value, $c) ? checkdate(intval($c[2]), intval($c[3]), intval($c[1])) : false;
        if ($checkDate) :
            return $value;
        endif;
        $date = explode('/', $value);
        return "{$date[2]}-{$date[1]}-{$date[0]}";
    }
}
