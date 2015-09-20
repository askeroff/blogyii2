<?php
namespace backend\models;

use \yii\db\ActiveRecord;


class Categories extends ActiveRecord
{


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




}
