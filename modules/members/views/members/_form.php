<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\members\models\Members */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cash')->textInput() ?>

    <?= $form->field($model, 'payword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textInput() ?>

    <?= $form->field($model, 'chat')->textInput() ?>

    <?= $form->field($model, 'sound')->textInput() ?>

    <?= $form->field($model, 'online')->textInput() ?>

    <?= $form->field($model, 'avatar')->textInput() ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'truename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'career')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin')->textInput() ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupid')->textInput() ?>

    <?= $form->field($model, 'regid')->textInput() ?>

    <?= $form->field($model, 'areaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms')->textInput() ?>

    <?= $form->field($model, 'credit')->textInput() ?>

    <?= $form->field($model, 'money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locking')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edittime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loginip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logintime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logintimes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'black')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send')->textInput() ?>

    <?= $form->field($model, 'auth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authvalue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vemail')->textInput() ?>

    <?= $form->field($model, 'vmobile')->textInput() ?>

    <?= $form->field($model, 'vtruename')->textInput() ?>

    <?= $form->field($model, 'vbank')->textInput() ?>

    <?= $form->field($model, 'vcompany')->textInput() ?>

    <?= $form->field($model, 'vtrade')->textInput() ?>

    <?= $form->field($model, 'trade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'support')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inviter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_agent')->textInput() ?>

    <?= $form->field($model, 'vip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bl')->textInput() ?>

    <?= $form->field($model, 'touxiang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topagentid')->textInput() ?>

    <?= $form->field($model, 'usertype')->textInput() ?>

    <?= $form->field($model, 'userbak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regareaid')->textInput() ?>

    <?= $form->field($model, 'comefrom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begoodatcatid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'experttype')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
