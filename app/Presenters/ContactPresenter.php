<?php

namespace TattooOpen\Presenters;

use Illuminate\Support\Carbon;

class ContactPresenter extends BasePresenter
{

    public function getValueCheck(int $position, string $value, string $param, $field)
    {
        if ($field->anamnesis->isNotEmpty())
            if ($value) :
                return ($field->anamnesis[$position]->$param == $value) ? true : null;
            else :
                return ($field->anamnesis[$position]->$param) ? $field->anamnesis[$position]->$param : null;
            endif;

        return null;
    }

    /**
     * Return FullName for Blade View
     * @return string
     */
    public function getFullName()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    /**
     * Return FullAddress for Blade View
     * @return string
     */
    public function getAddress()
    {
        $address  = $this->address ? $this->address . ', ' : '';
        $address .= $this->number ? $this->number . ' - ' : '';
        $address .= $this->strict ? $this->strict . ', ' : '';
        $address .= $this->city ? $this->city . ' - ' : '';
        $address .= $this->state ? $this->state . ', ' : '';
        $address .= $this->zip_code ?? '';

        return $address;
    }

    /**
     * Return Birthday Type for Blade Vies
     * @param  string|null $value
     * @return String
     */
    public function getBirthday(string $value = null)
    {
        if ($value == 'age')
            return ($this->birthday) ? Carbon::now()->diffInYears($this->birthday) . ' anos' : '';
        if ($value == 'check')
            return ($this->birthday) ? Carbon::now()->isBirthday($this->birthday) : false;
        if ($value == 'string')
            return ($this->birthday) ? self::formatBirthday($this->birthday->toArray()) : '';
        if ($value == 'format')
            return ($this->birthday) ? $this->birthday->format('d/m/Y') : false;
        return 'Defina o tipo de Data de Aniversário!';
    }

    /**
     * Return RegisterDate for Blade View
     * @return string
     */
    public function getRegister()
    {
        return $this->register->format('d/m/Y');
    }

    /**
     * Return FormataPhone for Blade View
     * @param  int|null
     * @return int
     */
    public function getPhone(int $value = null)
    {
        if ($value == 1)
            return ($this->phone1) ? self::phoneMask($this->phone1) : '';
        if ($value == 2)
            return ($this->phone2) ? self::phoneMask($this->phone2) : '';
        return 'Defina o tipo de telefone!';
    }

    /**
     * Return BirthdayStringFormat for Blade View
     * @param  array
     * @return array
     */
    private static function formatBirthday(array $value)
    {
        $now = Carbon::now();
        $date = Carbon::create($now->year, $value['month'], $value['day'])->toArray();

        switch ($date['month']) {
            case 1:
                $date['month'] = 'Janeiro';
                break;
            case 2:
                $date['month'] = 'Fevereiro';
                break;
            case 3:
                $date['month'] = 'Março';
                break;
            case 4:
                $date['month'] = 'Abril';
                break;
            case 5:
                $date['month'] = 'Maio';
                break;
            case 6:
                $date['month'] = 'Junho';
                break;
            case 7:
                $date['month'] = 'Julho';
                break;
            case 8:
                $date['month'] = 'Agosto';
                break;
            case 9:
                $date['month'] = 'Setembro';
                break;
            case 10;
                $date['month'] = 'Outubro';
                break;
            case 11:
                $date['month'] = 'Novembro';
                break;
            case 12:
                $date['month'] = 'Dezembro';
                break;
        }

        switch ($date['dayOfWeek']) {
            case 0:
                $date['dayOfWeek'] = 'Domingo';
                break;
            case 1:
                $date['dayOfWeek'] = 'Segunda Feira';
                break;
            case 2:
                $date['dayOfWeek'] = 'Terça Feira';
                break;
            case 3:
                $date['dayOfWeek'] = 'Quarta Feira';
                break;
            case 4:
                $date['dayOfWeek'] = 'Quinta Feira';
                break;
            case 5:
                $date['dayOfWeek'] = 'Sexta Feira';
                break;
            case 6;
                $date['dayOfWeek'] = 'Sábado';
                break;
        }

        return "{$date['dayOfWeek']}, {$date['day']} de {$date['month']} de {$date['year']}";
    }

    /**
     * Return PhoneMask for Blade View
     * @param  string
     * @return string
     */
    private static function phoneMask($value)
    {
        if (strlen($value) == 12)
            return $value = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{3})(\d*)/', '($1) $2.$3.$4', $value);
        if (strlen($value) == 11)
            return $value = preg_replace('/(\d{3})(\d{4})(\d{4})(\d*)/', '($1) $2.$3', $value);
        if (strlen($value) == 9)
            return $value = preg_replace('/(\d{3})(\d{3})(\d{3})(\d*)/', '$1.$2.$3', $value);
        return $value = preg_replace('/(\d{4})(\d{4})(\d*)/', '$1.$2', $value);
    }
}
