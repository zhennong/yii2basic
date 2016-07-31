<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\trades\models\Trades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'buyer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seller')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'linkurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_areaid')->textInput() ?>

    <?= $form->field($model, 'buyer_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_receive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updatetime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paytime')->textInput() ?>

    <?= $form->field($model, 'deliverytime')->textInput() ?>

    <?= $form->field($model, 'editor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'refund_reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wuliu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wuliu1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wuliubz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addressid')->textInput() ?>

    <?= $form->field($model, 'p_id')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'buyer_star')->textInput() ?>

    <?= $form->field($model, 'seller_star')->textInput() ?>

    <?= $form->field($model, 'duihuan')->textInput() ?>

    <?= $form->field($model, 'buystatus')->textInput() ?>

    <?= $form->field($model, 'mailsent')->textInput() ?>

    <?= $form->field($model, 'smssent')->textInput() ?>

    <?= $form->field($model, 'topagentid')->textInput() ?>

    <?= $form->field($model, 'alipaystatus')->textInput() ?>

    <?= $form->field($model, 'wuliueditor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'linkstatus')->textInput() ?>

    <?= $form->field($model, 'yfpayment')->textInput() ?>

    <?= $form->field($model, 'allgoods_needdays_addtime')->textInput() ?>

    <?= $form->field($model, 'allgoods_needdays')->textInput() ?>

    <?= $form->field($model, 'needwait')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderbelong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zhongzhuan')->textInput() ?>

    <?= $form->field($model, 'diprice')->textInput() ?>

    <?= $form->field($model, 'isdel')->textInput() ?>

    <?= $form->field($model, 'whodel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deltime')->textInput() ?>

    <?= $form->field($model, 'activeid')->textInput() ?>

    <?= $form->field($model, 'marketid')->textInput() ?>

    <?= $form->field($model, 'traderdo_pay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issue')->textInput() ?>

    <?= $form->field($model, 'issue_addtime')->textInput() ?>

    <?= $form->field($model, 'issue_finishtime')->textInput() ?>

    <?= $form->field($model, 'issue_bak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xunjia_ticheng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_menshiid')->textInput() ?>

    <?= $form->field($model, 'menshiids')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zhongzhuan_arrived')->textInput() ?>

    <?= $form->field($model, 'active_type')->textInput() ?>

    <?= $form->field($model, 'prolong_days')->textInput() ?>

    <?= $form->field($model, 'trade_remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
