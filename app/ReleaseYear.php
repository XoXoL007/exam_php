<?php

namespace App;

class ReleaseYear
{
    const listYear = [
        '2000',
        '2001',
        '2002',
        '2003',
        '2004',
        '2005',
        '2006',
        '2007',
        '2008',
        '2009',
        '2010',
        '2011',
        '2012',
        '2013',
        '2014',
        '2015',
        '2016',
        '2017',
        '2018',
        '2019',
        '2020'
    ];

    static function listYear()
    {
        return self::listYear;
    }

    public function validate($attribute, $value, $parameters, $validator)
    {
        $listYear = self::listYear();
        return isset( $listYear[$value]);
    }
}
