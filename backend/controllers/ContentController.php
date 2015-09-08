<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Content;
use backend\models\ContentForm;
use yii\web\Controller;



class ContentController extends Controller {
    public function actionAdd(){
        $model = new ContentForm();

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->user->can('createPost') && $content = $model->addPost()){
                Yii::$app->getSession()
                         ->addFlash('success', '<b>Запись успешно добавлена!</b>');
            }
            else{
                Yii::$app->getSession()
                    ->addFlash('error', '<b>Произошла ошибка. Запись не добавлена</b>');
            }
        }

        return $this->render('add',  [
            'model' => $model,
        ]);
    }

    public function actionNews(){
        $dataProvider = new ActiveDataProvider([
            'query' => Content::find()->with('author'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('news',  [
            'dataProvider' => $dataProvider, 'posts' => $dataProvider->getModels()
        ]);
    }
}