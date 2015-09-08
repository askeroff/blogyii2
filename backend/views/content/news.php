<?php
use yii\widgets\LinkPager;
use yii\grid\GridView;

$this->title = 'Список новостей';
$this->params['breadcrumbs'][] = $this->title;

?>



<table class="table table-striped table-bordered">
    <tr>
        <th>
            <a href="/content/news.html?sort=id" data-sort="id">Id</a>
        </th>
        <th>
            <a href="/content/news.html?sort=author_id" data-sort="author_id">Автор</a>
        </th>
        <th>
            <a href="/content/news.html?sort=name" data-sort="name">Название</a>
        </th>
        <th>
            <a href="/content/news.html?sort=add_time" data-sort="add_time">Дата</a>
        </th>
        <th>
            <a href="/content/news.html?sort=category_id" data-sort="category_id">Категория</a>
        </th>
        <th>
            <a href="/content/news.html?sort=status" data-sort="status">Статус</a>
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
        <?=  $post->name ?>
    </td>
    <td>
        <?=  date("m.d.y",$post->add_time) ?>
    </td>
    <td>
        <?=  $post->category_id ?>
    </td>
    <td>
        <?=  $post->status ?>
    </td>

    <td class="settings">
     <a title="Удалить" href="/?r=exercise/data&id= ">
     <i class="glyphicon glyphicon-remove"></i>
     </a>
        <a title="Редактировать" href="/?r=exercise/data&id= ">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    </td>

    </tr>
<?php
}
?>
</table>
<?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>


