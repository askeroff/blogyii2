<?php
namespace backend\models;

use \yii\db\ActiveRecord;
use Yii;
use creocoder\nestedsets\NestedSetsBehavior;
use backend\models\CategoryQuery;



class Categories extends ActiveRecord
{
    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public function rules(){
        return [
            ['slug', 'unique', 'message' => 'Ссылка должна быть уникальна'],
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string'],
        ];
    }

    public function addCategory(){
        if($this->validate()){
            $category                 = new Categories();
            $category->name            = $this->name;
            $category->slug            = $this->slug;

            if(Yii::$app->request->post('cats') == 0 && $category->makeRoot()) {
                return $category;
            } else {
                $parent = Categories::findOne(['id' => Yii::$app->request->post('cats')]);
                $category->makeRoot();
                $category->appendTo($parent);
                return $category;
            }


        }

        return null;
    }




}
