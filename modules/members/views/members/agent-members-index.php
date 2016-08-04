<?php

use kartik\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\members\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'AgentMembers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $agents = \app\models\Members::find()->where(['or', ['is_agent' => 1], ['>', 'topagentid', 0]])->select(['areaid', 'userid', 'topagentid', 'username', 'truename', 'mobile'])->asArray()->all();
    $agents = \app\components\Tools::list2tree($agents, 'userid', 'topagentid');
    ?>

    <p>
    <table>
        <thead>
        <tr>
            <th>areaid</th>
            <th>userid</th>
            <th>username</th>
            <th>truename</th>
            <th>mobile</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($agents as $k => $v): ?>
            <tr>
                <td><?= $v['areaid'] ?></td>
                <td><?= $v['userid'] ?></td>
                <td><?= $v['username'] ?></td>
                <td><?= $v['truename'] ?></td>
                <td><?= $v['mobile'] ?></td>
            </tr>
            <?php if (isset($v['_child'])): foreach ($v['_child'] as $k1 => $v1): ?>
                <tr>
                    <td></td>
                    <td><?= $v1['userid'] ?></td>
                    <td><?= $v1['username'] ?></td>
                    <td><?= $v1['truename'] ?></td>
                    <td><?= $v1['mobile'] ?></td>
                </tr>
            <?php endforeach; endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    </p>

    <p>
        <?= Html::a('Create Members', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => \kartik\grid\SerialColumn::className(),
                'contentOptions' => ['class' => 'kartik-sheet-style'],
                'width' => '36px',
                'header' => '',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
            [
                'class' => \kartik\grid\RadioColumn::className(),
                'width' => '36px',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
            [
                'class' => \kartik\grid\ExpandRowColumn::className(),
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return Yii::$app->controller->renderPartial('agent-downline-list', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true,
            ],

            'userid',
            'username',
            // 'passport',
            // 'company',
            // 'password',
            // 'cash',
            // 'payword',
            // 'email:email',
            // 'message',
            // 'chat',
            // 'sound',
            // 'online',
            // 'avatar',
            // 'gender',
            'truename',
            'mobile',
            // 'msn',
            // 'qq',
            // 'ali',
            // 'skype',
            // 'department',
            // 'career',
            // 'admin',
            // 'role',
            // 'aid',
            // 'groupid',
            // 'regid',
            // 'areaid',
            // 'sms',
            // 'credit',
            // 'money',
            // 'locking',
            // 'bank',
            // 'account',
            // 'edittime',
            // 'regip',
            // 'regtime',
            // 'loginip',
            // 'logintime',
            // 'logintimes',
            // 'black',
            // 'send',
            // 'auth',
            // 'authvalue',
            // 'authtime',
            // 'vemail:email',
            // 'vmobile',
            // 'vtruename',
            // 'vbank',
            // 'vcompany',
            // 'vtrade',
            // 'trade',
            // 'support',
            // 'inviter',
            // 'tel',
            'is_agent',
            // 'vip',
            // 'bl',
            // 'touxiang',
            // 'topagentid',
            // 'usertype',
            // 'userbak',
            // 'regareaid',
            // 'comefrom',
            // 'begoodatcatid',
            // 'experttype',

            ['class' => \kartik\grid\ActionColumn::className()],
        ],
    ]); ?>
</div>
