<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneBook */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Телефонная книга', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
