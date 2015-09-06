<?php
namespace backend\models;

use Yii;
//use yii\db\ActiveRecord;
use yii\base\Model;

class Content extends Model{
    public $id; // id of the post
    public $name; // title of the post
    public $slug; // /name-of-the-post in the url
    public $text_bb; // bb-format of the post
    public $text_html; //html format of the post
    public $add_time; // posted time
    public $author_id; // author of the post`s id
    public $category_id; // category where to publish
    public $url; // full url of the post

    public function tableName(){
        return '{{%content}}';
    }

  /*  protected function createPost(){

    }

    protected function updatePost(){

    }

    protected function deletePost(){

    }*/

}