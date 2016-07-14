<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\special\models\Special */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="special-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_at')->widget(DatePicker::className(), [
        'language' => 'zh-CN',
        'options' => ['placeholder' => 'Enter Admission Time ...'],
        'pluginOptions' => [
            'autoclose' => true,
        ],
    ]) ?>

    <?= $form->field($model, 'end_at')->widget(DatePicker::className(), [
        'language' => 'zh-CN',
        'options' => ['placeholder' => 'Enter Admission Time ...'],
        'pluginOptions' => [
            'autoclose' => true,
        ],
    ]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
