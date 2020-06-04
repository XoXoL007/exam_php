<?php

namespace App;

class Quality
{
    const listQuality = [
        '360p',
        '480p',
        '720p HD',
        '1080p FullHD',
        '2048p UltraHD',
        '4096p ExtraHD'
    ];

    static function listQuality()
    {
        return self::listQuality;
    }

    public function validate($attribute, $value, $parameters, $validator)
    {
        $listQuality = self::listQuality();
        return isset( $listQuality[$value]);
    }
}
