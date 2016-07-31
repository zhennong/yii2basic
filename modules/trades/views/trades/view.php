<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\trades\models\Trades */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Trades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->itemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->itemid], [
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
            'itemid',
            'buyer',
            'seller',
            'title',
            'note',
            'thumb',
            'linkurl:url',
            'production_time',
            'buyer_name',
            'buyer_areaid',
            'buyer_address',
            'buyer_phone',
            'buyer_mobile',
            'buyer_mail',
            'buyer_receive',
            'send_type',
            'send_no',
            'send_time',
            'addtime',
            'updatetime',
            'paytime:datetime',
            'deliverytime:datetime',
            'editor',
            'buyer_reason:ntext',
            'refund_reason:ntext',
            'status',
            'order',
            'pay',
            'wuliu',
            'wuliu1',
            'wuliubz',
            'addressid',
            'p_id',
            'total',
            'price',
            'amount',
            'buyer_star',
            'seller_star',
            'duihuan',
            'buystatus',
            'mailsent',
            'smssent',
            'topagentid',
            'alipaystatus',
            'wuliueditor',
            'linkstatus',
            'yfpayment',
            'allgoods_needdays_addtime:datetime',
            'allgoods_needdays',
            'needwait',
            'orderbelong',
            'zhongzhuan',
            'diprice',
            'isdel',
            'whodel',
            'deltime:datetime',
            'activeid',
            'marketid',
            'traderdo_pay',
            'issue',
            'issue_addtime:datetime',
            'issue_finishtime:datetime',
            'issue_bak',
            'xunjia_ticheng',
            'print_menshiid',
            'menshiids',
            'zhongzhuan_arrived',
            'active_type',
            'prolong_days',
            'trade_remark:ntext',
        ],
    ]) ?>

</div>
