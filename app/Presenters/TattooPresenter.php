<?php

namespace TattooOpen\Presenters;

use Illuminate\Support\Carbon;

class TattooPresenter extends BasePresenter
{
    /**
     * Return RegisterDate for Blade View
     * @return string
     */
    public function getDate()
    {
        return $this->date->format('d/m/Y');
    }
}
