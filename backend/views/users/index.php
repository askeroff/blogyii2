<?php
use yii\widgets\LinkPager;

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;

?>



<table class="table table-striped table-bordered">
    <tr>
        <th>
            <a href="?sort=id" data-sort="id">Id</a>
        </th>
        <th>
            <a href="?sort=author_id" data-sort="author_id">Ник</a>
        </th>
        <th>
            Почта
        </th>
    </tr>




    <?php
    foreach ($users as $user ) {
        ?>

        <tr>
            <td>
                <?= $user->id ?>
            </td>
            <td>
                <?=  $user->username ?>
            </td>
            <td>
                <?= $user->email; ?>
            </td>

        </tr>
        <?php
    }
    ?>
</table>
<?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>




