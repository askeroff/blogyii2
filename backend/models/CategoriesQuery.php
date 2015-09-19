<?php
namespace backend\models;

use paulzi\nestedintervals\NestedIntervalsQueryTrait;

class CategoriesQuery extends \yii\db\ActiveQuery
{
    use NestedIntervalsQueryTrait;
}