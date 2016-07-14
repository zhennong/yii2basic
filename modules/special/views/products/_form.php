<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\special\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'catid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mycatid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'special_id')->textInput() ?>

    <?= $form->field($model, 'typeid')->textInput() ?>

    <?= $form->field($model, 'areaid')->textInput() ?>

    <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'elite')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fee')->textInput() ?>

    <?= $form->field($model, 'introduce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'standard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minamount')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'days')->textInput() ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pptword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hits')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupid')->textInput() ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vip')->textInput() ?>

    <?= $form->field($model, 'validated')->textInput() ?>

    <?= $form->field($model, 'truename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'editor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edittime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'editdate')->textInput() ?>

    <?= $form->field($model, 'addtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adddate')->textInput() ?>

    <?= $form->field($model, 'auto_shelve_time')->textInput() ?>

    <?= $form->field($model, 'auto_shelf_time')->textInput() ?>

    <?= $form->field($model, 'auto_shelf_days')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'linkurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filepath')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dengji')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xuke')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biaozhun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zuowu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fangzhi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yaoliang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'func')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_func')->textInput() ?>

    <?= $form->field($model, 'xianjia')->textInput() ?>

    <?= $form->field($model, 'yuanjia')->textInput() ?>

    <?= $form->field($model, 'priceperarea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'endtodate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chuliren')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sccs')->textInput() ?>

    <?= $form->field($model, 'jifen')->textInput() ?>

    <?= $form->field($model, 'shuliang')->textInput() ?>

    <?= $form->field($model, 'addname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pricebak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priceperareabak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yuanprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activeid')->textInput() ?>

    <?= $form->field($model, 'actprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'linkpid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menshiid')->textInput() ?>

    <?= $form->field($model, 'menshiprice')->textInput() ?>

    <?= $form->field($model, 'minamountbak')->textInput() ?>

    <?= $form->field($model, 'n1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'v1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'v2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'v3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diprice')->textInput() ?>

    <?= $form->field($model, 'indextitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buytimes')->textInput() ?>

    <?= $form->field($model, 'disnoneprice')->textInput() ?>

    <?= $form->field($model, 'buytimesall')->textInput() ?>

    <?= $form->field($model, 'first_price_editor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_price_addtime')->textInput() ?>

    <?= $form->field($model, 'daily_indulgence_yuanprice')->textInput() ?>

    <?= $form->field($model, 'daily_indulgence_price')->textInput() ?>

    <?= $form->field($model, 'addeditor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
