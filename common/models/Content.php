<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Content extends ActiveRecord
{

    /*
     * Обозначение активности/неактивности записи
     * Служит для определения показывать запись или нет
     */
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
            [['name', 'slug', 'text_bb'], 'required'],
            [['name', 'slug', 'text_bb'], 'string'],
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