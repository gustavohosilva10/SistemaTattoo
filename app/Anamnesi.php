<?php

namespace TattooOpen;

use Illuminate\Database\Eloquent\Model;

class Anamnesi extends Model
{
    public $timestamps = false;
    public $fillable = ['contact_id', 'health', 'description', 'type'];

    // Relationships
    public function contact()
    {
        return $this->belongsTo('TattooOpen\Contact');
    }
}
