<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\activity\models\ActiveProducts;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\ActiveProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="active-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'active_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'active_price')->textInput() ?>

    <?= $form->field($model, 'original_price')->textInput() ?>

    <?= $form->field($model, 'market_id')->textInput() ?>

    <?= $form->field($model, 'sales_id')->textInput() ?>

    <?= $form->field($model, 'market_original_price')->textInput() ?>

    <?= $form->field($model, 'market_active_price')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(ActiveProducts::getStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
