<?php

namespace App\Casts;

use App\Quality;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Psy\Exception\TypeErrorException;

class QualityCast implements CastsAttributes
{

    public function get($model, $key, $value, $attributes)
    {
        return $this->getQuality($value);
    }

    public function set($model, $key, $value, $attributes)
    {
        $this->getQuality($value);

        return $value;
    }

    protected function getQuality($index)
    {
        $list = Quality::listQuality();

        if(!isset($list[$index]))
        {
            throw new TypeErrorException("Индекс качества [$index] отсутствует");
        }

        return $list[$index];
    }
}
