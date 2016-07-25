<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\members\models\MembersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'passport') ?>

    <?= $form->field($model, 'company') ?>

    <?= $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'cash') ?>

    <?php // echo $form->field($model, 'payword') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'chat') ?>

    <?php // echo $form->field($model, 'sound') ?>

    <?php // echo $form->field($model, 'online') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'truename') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'msn') ?>

    <?php // echo $form->field($model, 'qq') ?>

    <?php // echo $form->field($model, 'ali') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'career') ?>

    <?php // echo $form->field($model, 'admin') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'aid') ?>

    <?php // echo $form->field($model, 'groupid') ?>

    <?php // echo $form->field($model, 'regid') ?>

    <?php // echo $form->field($model, 'areaid') ?>

    <?php // echo $form->field($model, 'sms') ?>

    <?php // echo $form->field($model, 'credit') ?>

    <?php // echo $form->field($model, 'money') ?>

    <?php // echo $form->field($model, 'locking') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'account') ?>

    <?php // echo $form->field($model, 'edittime') ?>

    <?php // echo $form->field($model, 'regip') ?>

    <?php // echo $form->field($model, 'regtime') ?>

    <?php // echo $form->field($model, 'loginip') ?>

    <?php // echo $form->field($model, 'logintime') ?>

    <?php // echo $form->field($model, 'logintimes') ?>

    <?php // echo $form->field($model, 'black') ?>

    <?php // echo $form->field($model, 'send') ?>

    <?php // echo $form->field($model, 'auth') ?>

    <?php // echo $form->field($model, 'authvalue') ?>

    <?php // echo $form->field($model, 'authtime') ?>

    <?php // echo $form->field($model, 'vemail') ?>

    <?php // echo $form->field($model, 'vmobile') ?>

    <?php // echo $form->field($model, 'vtruename') ?>

    <?php // echo $form->field($model, 'vbank') ?>

    <?php // echo $form->field($model, 'vcompany') ?>

    <?php // echo $form->field($model, 'vtrade') ?>

    <?php // echo $form->field($model, 'trade') ?>

    <?php // echo $form->field($model, 'support') ?>

    <?php // echo $form->field($model, 'inviter') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'is_agent') ?>

    <?php // echo $form->field($model, 'vip') ?>

    <?php // echo $form->field($model, 'bl') ?>

    <?php // echo $form->field($model, 'touxiang') ?>

    <?php // echo $form->field($model, 'topagentid') ?>

    <?php // echo $form->field($model, 'usertype') ?>

    <?php // echo $form->field($model, 'userbak') ?>

    <?php // echo $form->field($model, 'regareaid') ?>

    <?php // echo $form->field($model, 'comefrom') ?>

    <?php // echo $form->field($model, 'begoodatcatid') ?>

    <?php // echo $form->field($model, 'experttype') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
