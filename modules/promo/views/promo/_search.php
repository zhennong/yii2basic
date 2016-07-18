<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\promo\models\PromoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'reuse') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'totime') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'special_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
