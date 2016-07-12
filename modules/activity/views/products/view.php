<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

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
            'catid',
            'mycatid',
            'typeid',
            'areaid',
            'pid',
            'level',
            'elite',
            'title',
            'style',
            'fee',
            'introduce',
            'model',
            'standard',
            'brand',
            'unit',
            'price',
            'minamount',
            'amount',
            'days',
            'tag',
            'keyword',
            'pptword',
            'hits',
            'old_img',
            'thumb',
            'thumb1',
            'thumb2',
            'username',
            'groupid',
            'company',
            'vip',
            'validated',
            'truename',
            'telephone',
            'mobile',
            'address',
            'email:email',
            'msn',
            'qq',
            'ali',
            'skype',
            'totime',
            'editor',
            'edittime',
            'editdate',
            'addtime',
            'adddate',
            'auto_shelve_time:datetime',
            'auto_shelf_time:datetime',
            'auto_shelf_days',
            'ip',
            'template',
            'status',
            'linkurl:url',
            'filepath',
            'note',
            'dengji',
            'xuke',
            'biaozhun',
            'zuowu',
            'fangzhi',
            'yaoliang',
            'func',
            'total_func',
            'xianjia',
            'yuanjia',
            'priceperarea',
            'endtodate',
            'open',
            'chuliren',
            'cj',
            'sccs',
            'jifen',
            'shuliang',
            'addname',
            'pricebak',
            'priceperareabak',
            'yuanprice',
            'activeid',
            'actprice',
            'linkpid',
            'menshiid',
            'menshiprice',
            'minamountbak',
            'n1',
            'n2',
            'n3',
            'v1',
            'v2',
            'v3',
            'diprice',
            'indextitle',
            'buytimes:datetime',
            'disnoneprice',
            'buytimesall:datetime',
            'first_price_editor',
            'first_price_addtime:datetime',
            'daily_indulgence_yuanprice',
            'daily_indulgence_price',
            'addeditor',
        ],
    ]) ?>

</div>
