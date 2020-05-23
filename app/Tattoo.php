<?php

namespace TattooOpen;

use TattooOpen\Presenters\TattooPresenter;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
    use PresentableTrait;

    protected $presenter = TattooPresenter::class;
    public $timestamps = false;
    public $fillable = ['contact_id', 'name', 'status', 'date'];
    protected $dates = ['date'];

    // Relationships
    public function contact()
    {
        return $this->belongsTo('TattooOpen\Contact');
    }

    public function setDateAttribute($value)
    {
        return $this->attributes['date'] = $this->isValidDate($value);
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
