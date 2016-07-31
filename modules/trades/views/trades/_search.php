<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\trades\models\TradesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'buyer') ?>

    <?= $form->field($model, 'seller') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'linkurl') ?>

    <?php // echo $form->field($model, 'production_time') ?>

    <?php // echo $form->field($model, 'buyer_name') ?>

    <?php // echo $form->field($model, 'buyer_areaid') ?>

    <?php // echo $form->field($model, 'buyer_address') ?>

    <?php // echo $form->field($model, 'buyer_phone') ?>

    <?php // echo $form->field($model, 'buyer_mobile') ?>

    <?php // echo $form->field($model, 'buyer_mail') ?>

    <?php // echo $form->field($model, 'buyer_receive') ?>

    <?php // echo $form->field($model, 'send_type') ?>

    <?php // echo $form->field($model, 'send_no') ?>

    <?php // echo $form->field($model, 'send_time') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <?php // echo $form->field($model, 'paytime') ?>

    <?php // echo $form->field($model, 'deliverytime') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'buyer_reason') ?>

    <?php // echo $form->field($model, 'refund_reason') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'pay') ?>

    <?php // echo $form->field($model, 'wuliu') ?>

    <?php // echo $form->field($model, 'wuliu1') ?>

    <?php // echo $form->field($model, 'wuliubz') ?>

    <?php // echo $form->field($model, 'addressid') ?>

    <?php // echo $form->field($model, 'p_id') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'buyer_star') ?>

    <?php // echo $form->field($model, 'seller_star') ?>

    <?php // echo $form->field($model, 'duihuan') ?>

    <?php // echo $form->field($model, 'buystatus') ?>

    <?php // echo $form->field($model, 'mailsent') ?>

    <?php // echo $form->field($model, 'smssent') ?>

    <?php // echo $form->field($model, 'topagentid') ?>

    <?php // echo $form->field($model, 'alipaystatus') ?>

    <?php // echo $form->field($model, 'wuliueditor') ?>

    <?php // echo $form->field($model, 'linkstatus') ?>

    <?php // echo $form->field($model, 'yfpayment') ?>

    <?php // echo $form->field($model, 'allgoods_needdays_addtime') ?>

    <?php // echo $form->field($model, 'allgoods_needdays') ?>

    <?php // echo $form->field($model, 'needwait') ?>

    <?php // echo $form->field($model, 'orderbelong') ?>

    <?php // echo $form->field($model, 'zhongzhuan') ?>

    <?php // echo $form->field($model, 'diprice') ?>

    <?php // echo $form->field($model, 'isdel') ?>

    <?php // echo $form->field($model, 'whodel') ?>

    <?php // echo $form->field($model, 'deltime') ?>

    <?php // echo $form->field($model, 'activeid') ?>

    <?php // echo $form->field($model, 'marketid') ?>

    <?php // echo $form->field($model, 'traderdo_pay') ?>

    <?php // echo $form->field($model, 'issue') ?>

    <?php // echo $form->field($model, 'issue_addtime') ?>

    <?php // echo $form->field($model, 'issue_finishtime') ?>

    <?php // echo $form->field($model, 'issue_bak') ?>

    <?php // echo $form->field($model, 'xunjia_ticheng') ?>

    <?php // echo $form->field($model, 'print_menshiid') ?>

    <?php // echo $form->field($model, 'menshiids') ?>

    <?php // echo $form->field($model, 'zhongzhuan_arrived') ?>

    <?php // echo $form->field($model, 'active_type') ?>

    <?php // echo $form->field($model, 'prolong_days') ?>

    <?php // echo $form->field($model, 'trade_remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
