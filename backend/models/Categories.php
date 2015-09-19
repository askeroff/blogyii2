<?php
namespace backend\models;

use paulzi\nestedintervals\NestedIntervalsBehavior;
use \yii\db\ActiveRecord;
use backend\models\CategoriesQuery;

class Categories extends ActiveRecord
{
    public function behaviors() {
        return [
            [
                'class' => NestedIntervalsBehavior::className(),
                // 'treeAttribute' => 'tree',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
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

            if($category->makeRoot()->save())
            {
                return $category;
            }
        }

        return null;
    }

    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }


}
