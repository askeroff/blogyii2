<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'Jay Askerov';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            <?php foreach($dataProvider as $content) { ?>
            <div class="col-lg-4 main-post">
                <h2>
                <a href="<?= Yii::$app->params['postUrlPrefix'] . $content->slug ?>">
                    <?= $content->name ?>
                </a>
                </h2>

                <p>
                    <?= $content->text_short ?>
                </p>

            </div>
<?php } ?>
            <?= LinkPager::widget(['pagination' => $model->pagination]) ?>

        </div>

    </div>
</div>
