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
                        'actions' => ['add', 'news', 'delete', 'edit'],
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
            } else{
                Yii::$app->getSession()
                         ->addFlash('error', '<b>Произошла ошибка. Запись не добавлена</b>');
            }
        }

        return $this->render('add',  [
            'model' => $model,
        ]);
    }

    /**
     * Вывод новостей в админ-панель для их управления
     * @dataProvider \backend\controllers\ContentController
     * @posts \backend\controllers\ContentController
     */

    public function actionNews()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Content::find()->with('author'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        return $this->render('news',  [
            'dataProvider' => $dataProvider,
            'posts' => $dataProvider->getModels()
        ]);
    }

    public function actionDelete($id)
    {
        if(Content::find()->where(['id' => $id])->one()->delete())
        {
            Yii::$app->getSession()
                ->addFlash('success', '<b>Запись успешно удалена</b>');
           return $this->actionNews();
        } else{
            Yii::$app->getSession()
                ->addFlash('success', '<b>Запись не удается удалить</b>');
            return $this->actionNews();
        }

    }

    public function actionEdit($id)
    {
        $model = Content::find()->where(['id' => $id])->one();
        if (isset($_POST['Content']) && $model->load(Yii::$app->request->post())) {
            $model->text_html = $model->text_bb;
            if ($model->validate() && $model->save()) {
                Yii::$app->getSession()
                    ->addFlash('success', '<b>Запись успешно отредактирована!</b>');
            } else {
                Yii::$app->getSession()
                    ->addFlash('error', '<b>Произошла ошибка. Запись не изменена</b>');
            }

        }
        return $this->render('edit',  [
            'model' =>  $model,
        ]);

    }
}
