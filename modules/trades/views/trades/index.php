<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\trades\models\TradesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trades-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'itemid',
            'buyer',
            // 'seller',
            // 'title',
            // 'note',
            // 'thumb',
            // 'linkurl:url',
            // 'production_time',
            // 'buyer_name',
            // 'buyer_areaid',
            // 'buyer_address',
            // 'buyer_phone',
            // 'buyer_mobile',
            // 'buyer_mail',
            // 'buyer_receive',
            // 'send_type',
            // 'send_no',
            // 'send_time',
            // 'addtime',
            // 'updatetime',
            // 'paytime:datetime',
            // 'deliverytime:datetime',
            // 'editor',
            // 'buyer_reason:ntext',
            // 'refund_reason:ntext',
            // 'status',
            // 'order',
            // 'pay',
            // 'wuliu',
            // 'wuliu1',
            // 'wuliubz',
            // 'addressid',
            // 'p_id',
            'total',
            'price',
            'amount',
            // 'buyer_star',
            // 'seller_star',
            // 'duihuan',
            // 'buystatus',
            // 'mailsent',
            // 'smssent',
            // 'topagentid',
            // 'alipaystatus',
            // 'wuliueditor',
            // 'linkstatus',
            // 'yfpayment',
            // 'allgoods_needdays_addtime:datetime',
            // 'allgoods_needdays',
            // 'needwait',
            // 'orderbelong',
            // 'zhongzhuan',
            // 'diprice',
            // 'isdel',
            // 'whodel',
            // 'deltime:datetime',
            // 'activeid',
            // 'marketid',
            // 'traderdo_pay',
            // 'issue',
            // 'issue_addtime:datetime',
            // 'issue_finishtime:datetime',
            // 'issue_bak',
            // 'xunjia_ticheng',
            // 'print_menshiid',
            // 'menshiids',
            // 'zhongzhuan_arrived',
            // 'active_type',
            // 'prolong_days',
            // 'trade_remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
