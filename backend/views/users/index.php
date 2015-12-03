<?php
use yii\widgets\LinkPager;

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;

function getRole($id){
  if(isset(\Yii::$app->authManager->getRolesByUser($id)['user']->description)) {
    return \Yii::$app->authManager->getRolesByUser($id)['user']->description;
  } elseif(isset(\Yii::$app->authManager->getRolesByUser($id)['moder']->description)) {
    return \Yii::$app->authManager->getRolesByUser($id)['moder']->description;
  } elseif(isset(\Yii::$app->authManager->getRolesByUser($id)['admin']->description)) {
    return \Yii::$app->authManager->getRolesByUser($id)['admin']->description;
  } else{
return "1";
}
}

?>



<table class="table table-striped table-bordered">
    <tr>
    <th>
    <input type="checkbox" name="check-all" class="check-all" value="1">
    </th>
        <th>
            <a href="?sort=id" data-sort="id">Id</a>
        </th>
        <th>
            <a href="?sort=author_id" data-sort="author_id">Ник</a>
        </th>
        <th>
            Почта
        </th>
        <th>
           :)
        </th>
    </tr>




    <?php
    foreach ($users as $user ) {
        ?>

        <tr>
        <td>
        <input type="checkbox" class="check-one" name="<?= $user->id ?>" value="<?= $user->id ?>">
        </td>
            <td>
                <?= $user->id ?>
            </td>
            <td>
                <?=  $user->username .  " - " . getRole($user->id);
                
                ?>
            </td>
            <td> 
             <?= $user->email ?>
    
            </td>
        <td class="settings">

        <a title="Редактировать" href="/users/edit?id=<?= $user->id ?>">
            <i class="glyphicon glyphicon-edit"></i>
        </a>

        <a class="delete-post-link" title="Удалить" href="#" data-del="/users/delete?id=<?= $user->id ?>">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </td>

        </tr>
        <?php
    }
    ?>
</table>

<a class="delete-post-link delete-all" href="#" data-del=""> Delete all </a>

<?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>








