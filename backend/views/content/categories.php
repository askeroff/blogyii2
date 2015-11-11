<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Categories;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-signup">

    <h1><?= Html::encode($this->title) ?></h1>

    <h1 style="text-align:center;">Добавить категорию</h1>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'addContent']]); ?>
            <label class="control-label" for="categories-cats">Родительская категория</label>
            <select name="cats" id="cat-list">
                <option value="0">Нет</option>
                <?php
                foreach ($categories as $category ) {
                ?>
                 <option value="<?= $category->id ?>"><?= $category->name ?></option>
                 <?php }
                 ?>
            </select>

            <?= $form->field($model, 'name')->label('Название') ?>

            <?= $form->field($model, 'slug')->label('Путь к ссылке') ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end();?>

        </div>

    </div>

    <h1 style="text-align:center;">Список категорий</h1>

    <?php 
  $categories      =Categories::find()->orderBy('tree,lft, rgt')->all();
  $level           = 0;

  foreach($categories as $n=>$category)
{
    if($category->depth==$level)
        echo "</li> \n";
    else if($category->depth>$level)
        echo "<ul>\n";
    else
    {
        echo "</li>\n";

        for($i=$level-$category->depth;$i;$i--)
        {
            echo "</ul>\n";
            echo "</li>\n";
        }
    }

    echo "<li>\n";
    echo Html::encode($category->name);
    $level=$category->depth;
}

for($i=$level;$i;$i--)
{
    echo "</li>\n";
    echo "</ul>\n";
}

    ?>

</div>
