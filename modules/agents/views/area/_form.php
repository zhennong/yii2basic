<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agents\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'areaname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrparentid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child')->textInput() ?>

    <?= $form->field($model, 'arrchildid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'listorder')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
