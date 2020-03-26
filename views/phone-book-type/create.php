<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneBookType */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Группы контактов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-book-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
