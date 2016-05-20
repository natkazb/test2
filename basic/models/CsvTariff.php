<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 20.05.2016
 * Time: 18:17
 */

namespace app\models;


class CsvTariff extends CsvModel{
    public static $title = "Tariff"; // название источника данных

    public static $url = ""; // базовый URL

    public static $script = "asr/tariff/tariffs.sql";

    public function attributes() // массив названий полей
    {
        return [
            'id',
            'svcId',
            'title',
            'price',
            'fromDate',
            'toDate',
        ];
    }

    public static function GetData($params)
    {
        return parent::GetData(self::$url, self::$script, $params, self::attributes());
    }
}