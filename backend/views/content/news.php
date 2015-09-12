<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = 'Список новостей';
$this->params['breadcrumbs'][] = $this->title;

?>



<table class="table table-striped table-bordered">
    <tr>
        <th>
            <a href="?sort=id" data-sort="id">Id</a>
        </th>
        <th>
            <a href="?sort=author_id" data-sort="author_id">Автор</a>
        </th>
        <th>
            <a href="?sort=name" data-sort="name">Название</a>
        </th>
        <th>
            <a href="?sort=add_time" data-sort="add_time">Дата</a>
        </th>
        <th>
            <a href="?sort=category_id" data-sort="category_id">Категория</a>
        </th>
        <th>
            <a href="?sort=status" data-sort="status">Статус</a>
        </th>
        <th>
           :)
        </th>
    </tr>




<?php
foreach ($posts as $post ) {
?>

    <tr>
    <td>
         <?= $post->id ?>
    </td>
    <td>
        <?=  $post->author->username ?>
    </td>
    <td>
        <?= HTML::a($post->name, Yii::$app->params['frontEndUrl'] . '/post/' . $post->slug) ?>
    </td>
    <td>
        <?=  date("m.d.y",$post->add_time) ?>
    </td>
    <td>
        <?=  $post->category_id ?>
    </td>
    <td class="settings">
        <?php
        if($post->status == 0){
            echo "<i class='status-inactive glyphicon glyphicon-minus-sign'></i>";
        } else{
            echo "<i class='status-active glyphicon glyphicon-plus-sign'></i>";
        }
        ?>
    </td>

    <td class="settings">

        <a title="Редактировать" href="/content/edit?id=<?= $post->id ?>">
            <i class="glyphicon glyphicon-edit"></i>
        </a>

        <a class="delete-post-link" title="Удалить" href="#" data-del="/content/delete?id=<?= $post->id ?>">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </td>

    </tr>
<?php
}
?>
</table>
<?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>




