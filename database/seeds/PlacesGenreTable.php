<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlacesGenreTable extends Seeder
{

    static $placesGenre = [
        'Аниме',
        'Боевик',
        'Детектив',
        'Детский',
        'Документальный',
        'Драма',
        'Исторический',
        'Комедия',
        'Криминал',
        'Мелодрама',
        'Мистика',
        'Мультфильм',
        'Научный',
        'Приключения',
        'Семейный',
        'Спорт',
        'Триллер',
        'Ужасы',
        'Фантастика'
    ];

    public function run()
    {
        /**
         * Добавление Жанров
         */
        foreach (self::$placesGenre as $placeGenre){
            DB::table('genres')->insert([
                'name'=>$placeGenre,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
        }
    }
}
