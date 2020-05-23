<?php

namespace TattooOpen;

use TattooOpen\Presenters\SessionPresenter;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use PresentableTrait;

    protected $presenter = SessionPresenter::class;
    public $timestamps = false;
    public $fillable = ['contact_id', 'date'];
    protected $dates = ['date'];

    // Relationships
    public function contact()
    {
        return $this->belongsTo('TattooOpen\Contact');
    }
}
