<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 19.05.2016
 * Time: 16:53
 */

namespace app\models;
use yii\data\ArrayDataProvider;


class CsvModel {

    public static function GetData($url, $script, $params, $attributes) // $params - строка параметров
    {
        //$csv = file_get_contents(self::$url.'?script='.self::$script.$params); // получили данные в виде csv
        //$csv = "id;holiday;is_weekend;1;2016-05-16;;2;2016-05-17;;3;2016-05-18;;4;2016-05-19;;5;2016-05-20;;6;2016-05-21;1;7;2016-05-22;1;"; // для теста
        $csv = "id;svcId;title;price;fromDate;toDate;1;1;Тариф1;10;2016-05-01;2016-05-25;2;3;Тариф2;35;2016-04-05;2016-05-10;"; // для теста
        $N = count($attributes);
        // преобразуем $csv в array($data)
        try {
            $dataCsv = str_getcsv($csv, ';');
            $i = 0;
            $j = 0;
            foreach ($dataCsv as $value) {
                if ($i >= $N) // пропускаем заголовок csv-файла
                {
                    $temp[$attributes[$j]] = $value;
                    $j++;
                    if ($j == $N) {
                        $data[] = $temp;
                        $j = 0;
                    }
                }
                $i++;
            }
        } catch (Exception $e) {
            $data = [['error' => $e->getMessage()]];
        }
        print_r($data);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => $attributes,
            ],
        ]);
        return $dataProvider;
    }

}