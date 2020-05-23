<?php

namespace TattooOpen\Presenters;

use Illuminate\Support\Carbon;

class SessionPresenter extends BasePresenter
{
    /**
     * Return RegisterDate for Blade View
     * @return string
     */
    public function getDate()
    {
        return self::formatDate($this->date->toArray());
    }

    /**
     * Return DateStringFormat for Blade View
     * @param  array
     * @return array
     */
    private static function formatDate(array $value)
    {
        switch ($value['month']) {
            case 1:
                $value['month'] = 'Janeiro';
                break;
            case 2:
                $value['month'] = 'Fevereiro';
                break;
            case 3:
                $value['month'] = 'Março';
                break;
            case 4:
                $value['month'] = 'Abril';
                break;
            case 5:
                $value['month'] = 'Maio';
                break;
            case 6:
                $value['month'] = 'Junho';
                break;
            case 7:
                $value['month'] = 'Julho';
                break;
            case 8:
                $value['month'] = 'Agosto';
                break;
            case 9:
                $value['month'] = 'Setembro';
                break;
            case 10;
                $value['month'] = 'Outubro';
                break;
            case 11:
                $value['month'] = 'Novembro';
                break;
            case 12:
                $value['month'] = 'Dezembro';
                break;
        }

        switch ($value['dayOfWeek']) {
            case 0:
                $value['dayOfWeek'] = 'Domingo';
                break;
            case 1:
                $value['dayOfWeek'] = 'Segunda Feira';
                break;
            case 2:
                $value['dayOfWeek'] = 'Terça Feira';
                break;
            case 3:
                $value['dayOfWeek'] = 'Quarta Feira';
                break;
            case 4:
                $value['dayOfWeek'] = 'Quinta Feira';
                break;
            case 5:
                $value['dayOfWeek'] = 'Sexta Feira';
                break;
            case 6;
                $value['dayOfWeek'] = 'Sábado';
                break;
        }

        if (strlen($value['minute']) !== 2) :
            $minutes = number_format($value['minute'], 1, '', '');
        else :
            $minutes = $value['minute'];
        endif;

        return "{$value['dayOfWeek']}, {$value['day']} de {$value['month']} de {$value['year']} às {$value['hour']}:{$minutes}";
    }
}
