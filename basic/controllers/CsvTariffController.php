<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 20.05.2016
 * Time: 18:22
 */

namespace app\controllers;
use app\models\CsvTariff;


class CsvTariffController extends \yii\web\Controller{

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update']);
        return $actions;
    }

    public function actionIndex()
    {
        $param_str=""; // строка параметров ...&..&...&
        $dataProvider = CsvTariff::GetData($param_str);
        return $this->render('index', ['dataProvider' => $dataProvider, 'title' => CsvTariff::$title]);
    }

}