<?php
namespace backend\controllers;

use Yii;
use backend\models\ContentForm;
use yii\web\Controller;



class ContentController extends Controller {
    public function actionAdd(){
        $model = new ContentForm();

        if ($model->load(Yii::$app->request->post())) {
            if($post = $model->addPost()){
                Yii::$app->getSession()
                         ->addFlash('success', '<b>Запись успешно добавлена!</b>');
            }
            else{
                Yii::$app->getSession()
                    ->addFlash('danger', '<b>Произошла ошибка. Запись не добавлена</b>');
            }
        }

        return $this->render('add',  [
            'model' => $model,
        ]);
    }
}