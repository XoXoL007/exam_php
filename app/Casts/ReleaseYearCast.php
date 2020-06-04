<?php

namespace App\Casts;

use App\ReleaseYear;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Psy\Exception\TypeErrorException;

class ReleaseYearCast implements CastsAttributes
{

    public function get($model, $key, $value, $attributes)
    {
        return $this->GetYear($value);
    }

    public function set($model, $key, $value, $attributes)
    {
        $this->GetYear($value);

        return $value;
    }

    protected function GetYear($index)
    {
        $list = ReleaseYear::listYear();

        if(!isset($list[$index]))
        {
            throw new TypeErrorException("Индекс [$index] отсутствует");
        }

        return $list[$index];
    }
}
