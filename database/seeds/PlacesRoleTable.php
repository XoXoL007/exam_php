<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlacesRoleTable extends Seeder
{
    static $placesRole = [
        'Администратор',
        'Модератор',
        'Редактор',
        'Дизайнер',
        'Пользователь'
    ];

    public function run()
    {
        /**
         * Добавление Ролей
         */
        foreach ( self::$placesRole as $placeRole) {
            DB::table('roles')->insert([
                'name'=>$placeRole,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
        }
    }
}
