<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;



class Content extends ActiveRecord
{

    public static function tableName()
    {
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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'slug'
            ],


        ];
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => 1],
            [['name', 'slug', 'text_bb', 'text_short', 'category_id'], 'required'],
            [['name', 'slug', 'text_bb', 'text_short'], 'string'],

        ];
    }

    /*
     * связь с таблицей пользователей для определения автора записи
     */

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }



}