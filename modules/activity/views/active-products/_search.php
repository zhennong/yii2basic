<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\ActiveProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="active-products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'active_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'active_price') ?>

    <?= $form->field($model, 'original_price') ?>

    <?= $form->field($model, 'price_bak') ?>

    <?php // echo $form->field($model, 'market_id') ?>

    <?php // echo $form->field($model, 'sales_id') ?>

    <?php // echo $form->field($model, 'market_original_price') ?>

    <?php // echo $form->field($model, 'market_active_price') ?>

    <?php // echo $form->field($model, 'market_price_bak') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
