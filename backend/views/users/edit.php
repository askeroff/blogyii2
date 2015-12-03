<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Редактирование пользователя';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'editContent']]); ?>

            <?= $form->field($model, 'username')->label('Логин') ?>

            <?= $form->field($model, 'email')->label('Почта') ?>

            <?= $form->field($model, 'status')->dropDownList([
            10 =>'Admin', 
            5  => 'Moder', 
            2  => 'User'
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'edit-button']) ?>
            </div>

         <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>