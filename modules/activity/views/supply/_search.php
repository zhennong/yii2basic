<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\SupplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supply-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'cj') ?>

    <?= $form->field($model, 'product') ?>

    <?= $form->field($model, 'standard') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'activeid') ?>

    <?php // echo $form->field($model, 'yuanprice') ?>

    <?php // echo $form->field($model, 'actprice') ?>

    <?php // echo $form->field($model, 'isfahuo') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'edittime') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'yjarea') ?>

    <?php // echo $form->field($model, 'pid') ?>

    <?php // echo $form->field($model, 'linkpid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
