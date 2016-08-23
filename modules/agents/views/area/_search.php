<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agents\models\AreaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'areaid') ?>

    <?= $form->field($model, 'areaname') ?>

    <?= $form->field($model, 'parentid') ?>

    <?= $form->field($model, 'arrparentid') ?>

    <?= $form->field($model, 'child') ?>

    <?php // echo $form->field($model, 'arrchildid') ?>

    <?php // echo $form->field($model, 'listorder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
