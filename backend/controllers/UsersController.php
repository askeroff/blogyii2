<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\User;

class UsersController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'delete', 'edit'],
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


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        return $this->render('index',  [
            'dataProvider' => $dataProvider,
            'users' => $dataProvider->getModels()
        ]);
    }

        public function actionDelete($id = 'none', $ids='none')
    {
      if($id != 'none') {
        if(User::find()->where(['id' => $id])->one()->delete())
        {
            Yii::$app->getSession()
                ->addFlash('success', '<b>Пользователь успешно удален</b>');
           return $this->actionIndex();
        } else{
            Yii::$app->getSession()
                ->addFlash('success', '<b>Не удалось удалить пользователя</b>');
            return $this->actionIndex();
        }
      }

      if($ids != 'none') {
          $ids = explode(',', $ids);
        if(User::deleteAll(['id' => $ids ]))
        {
            Yii::$app->getSession()
                ->addFlash('success', '<b>Пользователи успешно удалены</b>');
           return $this->actionIndex();
        } else{
            Yii::$app->getSession()
                ->addFlash('success', '<b>Не удалось удалить пользователя</b>');
            return $this->actionIndex();
        }
         
      }
       
    }

        public function rolesAssignment($stat, $userId)
    {
      $auth = Yii::$app->authManager;

      if($stat == '2') {
        $userRole = $auth->getRole('user');
      } elseif($stat == '5') {
        $userRole = $auth->getRole('moder');
      } elseif($stat == '10') {
        $userRole = $auth->getRole('admin');
      }
      $auth->revokeAll($userId);
      $auth->assign($userRole, $userId);
    }

        public function actionEdit($id)
    {
        $model = User::find()->where(['id' => $id])->one();
        if (isset($_POST['User']) && $model->load(Yii::$app->request->post())) {
            
            if ($model->validate()) {
              $this->rolesAssignment($model->status, $id);
              $model->save();
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