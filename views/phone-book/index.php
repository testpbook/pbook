<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\PhoneBookType;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PhoneBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Телефонная книга';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'phone_book_type_id',
                'content'=>function($data){ return $data->phoneBookType->name;},
                'filter'=> ArrayHelper::map(PhoneBookType::find()->orderby(['name' => SORT_ASC])->all(), 'id', 'name'),
            ],
            'name',
            'surname',
            'middle_name',
            'phone',
            //'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>