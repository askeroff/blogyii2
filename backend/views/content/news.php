<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;


$this->title = 'Список новостей';
$this->params['breadcrumbs'][] = $this->title;

?>




<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'status',
        'author_id'
    ],
]) ?>