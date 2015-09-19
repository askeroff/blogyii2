<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-signup">

    <h1><?= Html::encode($this->title) ?></h1>


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

                <?php } ?>
            </select>

            <?= $form->field($model, 'name')->label('Название') ?>

            <?= $form->field($model, 'slug')->label('Путь к ссылке') ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end();?>

        </div>

    </div>
</div>
