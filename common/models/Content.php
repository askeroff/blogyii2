<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Content extends  ActiveRecord{
    public $name; // title of the post
    public $slug; // /name-of-the-post in the url
    public $text_bb; // bb-format of the post
    public $text_html; //html format of the post
    public $add_time; // posted time
    public $author_id; // author of the post`s id
    public $category_id; // category where to publish
    public $url; // full url of the post

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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }



}