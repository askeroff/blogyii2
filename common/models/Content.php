<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Content extends ActiveRecord{

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    public static function tableName(){
        return '{{%content}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['add_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['add_time'],
                ],
            ],
        ];
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_INACTIVE, self::STATUS_ACTIVE]],
        ];
    }

    public static function findPost($id){
        return static::findOne(['id' => $id]);
    }

    public function getActive(){
        return $this->andWhere(['status' => self::STATUS_ACTIVE]);
    }

    public function getAuthor(){
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }



}