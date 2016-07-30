<?php

use kartik\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\members\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'BigMembers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?php // Html::a('Create Members', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        'userid',
        'username',
        'truename',
        'mobile',
        [
            'attribute'=>'tradesCount',
            'pageSummary'=>true,
        ],
        [
            'attribute'=>'tradesTotal',
            'pageSummary'=>true,
        ],
        [
            'attribute'=>'tradesAmount',
            'pageSummary'=>true,
        ],
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
        // 'truename',
        // 'mobile',
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
        // 'is_agent',
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

        ['class' => 'yii\grid\ActionColumn'],
    ];
    $fullExportMenu = ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'target' => ExportMenu::TARGET_BLANK,
        'fontAwesome' => true,
        'pjaxContainerId' => 'kv-pjax-container',
        'dropdownOptions' => [
            'label' => 'Full',
            'class' => 'btn btn-default',
            'itemsBefore' => [
                '<li class="dropdown-header">Export All Data</li>',
            ],
        ],
    ]);
    ?>
    <?= GridView::widget([
        'responsive'=>true,//自适应，默认为true
        'hover'=>true,//鼠标移动上去时，颜色变色，默认为false
//        'floatHeader'=>true,//向下滚动时，标题栏可以fixed，默认为false
//        'showPageSummary'=>true,//显示统计栏，默认为false
        'panel' => [
            'heading'=>false,//不要了
            'before'=>'<div style="margin-top:8px">{summary}</div>',//放在before中，前面的div主要是想让它好看
        ],
        'toolbar' => [
            '{export}',
            $fullExportMenu,
            ['content'=>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                    'type'=>'button',
                    'title'=>Yii::t('kvgrid', 'Add Book'),
                    'class'=>'btn btn-success'
                ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], [
                    'data-pjax'=>0,
                    'class' => 'btn btn-default',
                    'title'=>Yii::t('kvgrid', 'Reset Grid')
                ])
            ],
        ],
        'export'=>[
            'fontAwesome'=>'fa fa-share-square-o',//图标
            'target'=>'_blank',//在新标签打开
            'encoding'=>'gbk',//编码
        ],
        'exportConfig' => [
            GridView::CSV => [
                'label' => '导出CSV',
                'iconOptions' => ['class' => 'text-primary'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => '用户表'.date("Y-m-d"),
                'alertMsg' => '确定要导出CSV格式文件？',
                'options' => [
                    'title'=>'',
                ],
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ",",
                    'rowDelimiter' => "\r\n",
                ],
            ],
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>
</div>
