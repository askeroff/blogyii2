<?php

/* @var $this yii\web\View */

$this->title = 'Админ-панель';
?>
<div class="site-index">
    <h1>Админ-панель</h1>

    <?php
    if (\Yii::$app->user->can('createPost')) {
        echo "Create post";
    }
    ?>

</div>
