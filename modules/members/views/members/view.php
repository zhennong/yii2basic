<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\members\models\Members */

$this->title = $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userid',
            'username',
            'passport',
            'company',
            'password',
            'cash',
            'payword',
            'email:email',
            'message',
            'chat',
            'sound',
            'online',
            'avatar',
            'gender',
            'truename',
            'mobile',
            'msn',
            'qq',
            'ali',
            'skype',
            'department',
            'career',
            'admin',
            'role',
            'aid',
            'groupid',
            'regid',
            'areaid',
            'sms',
            'credit',
            'money',
            'locking',
            'bank',
            'account',
            'edittime',
            'regip',
            'regtime',
            'loginip',
            'logintime',
            'logintimes',
            'black',
            'send',
            'auth',
            'authvalue',
            'authtime',
            'vemail:email',
            'vmobile',
            'vtruename',
            'vbank',
            'vcompany',
            'vtrade',
            'trade',
            'support',
            'inviter',
            'tel',
            'is_agent',
            'vip',
            'bl',
            'touxiang',
            'topagentid',
            'usertype',
            'userbak',
            'regareaid',
            'comefrom',
            'begoodatcatid',
            'experttype',
        ],
    ]) ?>

</div>
