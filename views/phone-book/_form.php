<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\PhoneBookType;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-book-form">

    <?php $form = ActiveForm::begin(); ?>

	<?=$form->field($model, 'phone_book_type_id')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(PhoneBookType::find()->orderby(['name' => SORT_ASC])->all(), 'id', 'name'),
		'options' => ['placeholder' => 'Выбрать...'],
		]);
	?>

	<div class="row">
		<div class="col-md-4">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
    
	<?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
		'mask' => '+7 (999) 999-99-99',
	]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
