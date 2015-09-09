<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Content;
use backend\models\ContentForm;
use yii\web\Controller;
use yii\filters\AccessControl;




class ContentController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['add', 'news', 'delete'],
                        'allow' => true,
                        'roles' => ['admin', 'moder'],
                    ]]]];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /*
     * Добавление записи, проверка прав и вывод сообщений
     */
    public function actionAdd()
    {
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

    /*
     * Вывод новостей в админ-панель для их управления
     * @$dataProvider \backend\controllers\ContentController
     * @$posts \backend\controllers\ContentController
     */

    public function actionNews()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Content::find()->with('author'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('news',  [
            'dataProvider' => $dataProvider,
            'posts' => $dataProvider->getModels()
        ]);
    }

    public function actionDelete($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Content::find()->with('author'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('news', [
            'id' => $id,
            'exercises' => Content::find()->where(['id' => $id])->one()->delete(),
            'dataProvider' => $dataProvider,
            'posts' => $dataProvider->getModels()
        ]);
    }
}
