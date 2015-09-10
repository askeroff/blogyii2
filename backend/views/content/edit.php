<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Редактирование записи';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-signup">
    <?php if (Yii::$app->user->can('updatePost')){ ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'editContent']]); ?>

            <?= $form->field($model, 'name')->label('Название') ?>

            <?= $form->field($model, 'slug')->label('Путь к ссылке') ?>

            <?= $form->field($model, 'text_bb')->textarea()->label('Текст новости') ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'edit-button']) ?>
            </div>

            <?php ActiveForm::end(); }?>
        </div>
    </div>
</div>