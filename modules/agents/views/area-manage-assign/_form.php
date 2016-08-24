<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\modules\agents\models\AreaManageAssign;

/* @var $this yii\web\View */
/* @var $model app\modules\agents\models\AreaManageAssign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-manage-assign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'area_id')->widget(Select2::className(), [
        'data'=>AreaManageAssign::getAreaIdToName(),
    ]) ?>

    <?= $form->field($model, 'manager_id')->dropDownList(AreaManageAssign::getManagerIdToName()) ?>

    <?= $form->field($model, 'fasten')->dropDownList(AreaManageAssign::getFasten()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
