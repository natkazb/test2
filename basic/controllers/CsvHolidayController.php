<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 20.05.2016
 * Time: 14:34
 */

namespace app\controllers;
use app\models\CsvHoliday;


class CsvHolidayController extends \yii\web\Controller{

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update']);
        return $actions;
    }

    public function actionIndex()
    {
        $param_str=""; // строка параметров ...&..&...&
        $dataProvider = CsvHoliday::GetData($param_str);
        return $this->render('index', ['dataProvider' => $dataProvider, 'title' => CsvHoliday::$title]);
    }

}