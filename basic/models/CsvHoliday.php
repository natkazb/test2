<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 20.05.2016
 * Time: 11:03
 */

namespace app\models;


class CsvHoliday extends CsvModel{
    public static $title = "Holiday"; // название источника данных

    public static $url = ""; // базовый URL

    public static $script = "warehouse/ext/holidays.sql";

    public function attributes() // массив названий полей
    {
        return [
            'id',
            'holiday',
            'is_weekend',
        ];
    }

    public static function GetData($params)
    {
        return parent::GetData(self::$url, self::$script, $params, self::attributes());
    }
}