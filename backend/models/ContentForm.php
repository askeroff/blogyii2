<?php
namespace backend\models;

use common\models\Content;
use yii\base\Model;
use Yii;

class ContentForm extends Model{
    public $name; // title of the post
    public $slug; // /name-of-the-post in the url
    public $text_bb; // bb-format of the post
    public $status;
    public $text_html; //html format of the post
    public $add_time; // posted time
    public $author_id; // author of the post`s id
    public $category_id; // category where to publish
    public $url; // full url of the post

    public function rules(){
        return [
          ['slug', 'unique', 'targetClass' => 'common\Models\Content', 'message' => 'Ссылка должна быть уникальна'],
          [['name', 'slug', 'text_bb', 'status'], 'required'],
          [['name', 'slug', 'text_bb'], 'string'],
        ];
    }

    public function addPost(){
        if($this->validate()){
            $content                  = new Content();
            $content->name            = $this->name;
            $content->slug            = $this->slug;
            $content->text_bb         = $this->text_bb;
            $content->text_html       = $this->text_bb;
            $content->author_id       = Yii::$app->user->id;
            $content->category_id     = 1;
            $content->url             = Yii::$app->params['frontEndUrl'] . "/posts/" . $this->slug;
            $content->status          = ($this->status == 1) ? 1 : 0;

            if($content->save())
            {
                return $content;
            }
        }

        return null;
    }


}