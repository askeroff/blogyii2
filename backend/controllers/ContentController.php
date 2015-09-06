<?php
namespace backend\controllers;

use Yii;
use backend\models\Content;
use yii\web\Controller;



class ContentController extends Controller {
    public function actionAdd(){
        $model = new Content();

        return $this->render('add',  [
            'model' => $model,
        ]);
    }
}