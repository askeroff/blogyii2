<?php
namespace backend\models;

use common\models\Content;
use yii\base\Model;
use yii\helpers\Url;
use Yii;

class ContentForm extends Model{
    public $name; // title of the post
    public $slug; // /name-of-the-post in the url
    public $text_bb; // bb-format of the post
    public $text_html; //html format of the post
    public $add_time; // posted time
    public $author_id; // author of the post`s id
    public $category_id; // category where to publish
    public $url; // full url of the post

    public function rules(){
        return [
          [['name', 'slug', 'text_bb'], 'required'],
          [['name', 'slug', 'text_bb'], 'string'],
        ];
    }

    public function addPost(){
        if($this->validate()){
            $post                  = new Content();
            $post->name            = $this->name;
            $post->slug            = $this->slug;
            $post->text_bb         = $this->text_bb;
            $post->author_id       = Yii::$app->user->id;
            $post->category_id     = 1;
            $post->url             = Url::base() . "/posts/" . $this->slug;

            if($post->save()){
                return $post;
            }
        }

        return null;
    }
}