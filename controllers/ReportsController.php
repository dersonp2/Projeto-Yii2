<?php


namespace app\controllers;


use app\models\Bill;
use yii\web\Controller;

class ReportsController extends Controller
{
    public function actionIndex(){

      /** @var Bill[] $allBills */
        $allBills = Bill::find()
            ->orderBy('date Asc')->all();

        $result = [];

        foreach ($allBills as $bill){
            $result[$bill->date][]= $bill;
        }

        return $this->render('index', ['data' => $result]);
    }

}