<?php
\yii\helpers\Url::to(['article/view', 'id'=>$data->id, 'slug'=>$data->slug]);

/* @var $this yii\web\View */

$this->title = $data->name;

?>

<div class="body-content">
    <h2><?= $this->title ?></h2>

<?= $data->text_bb ?>

</div>
