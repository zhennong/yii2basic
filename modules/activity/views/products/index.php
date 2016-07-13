<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\activity\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // echo Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'itemid',
            // 'catid',
            // 'mycatid',
            // 'typeid',
            // 'areaid',
            // 'pid',
            // 'level',
            // 'elite',
            'title',
            // 'style',
            // 'fee',
            // 'introduce',
            // 'model',
            'standard',
            // 'brand',
            // 'unit',
            'price',
            // 'minamount',
            // 'amount',
            // 'days',
            // 'tag',
            // 'keyword',
            // 'pptword',
            // 'hits',
            // 'old_img',
            // 'thumb',
            // 'thumb1',
            // 'thumb2',
            // 'username',
            // 'groupid',
            // 'company',
            // 'vip',
            // 'validated',
            // 'truename',
            // 'telephone',
            // 'mobile',
            // 'address',
            // 'email:email',
            // 'msn',
            // 'qq',
            // 'ali',
            // 'skype',
            // 'totime',
            // 'editor',
            // 'edittime',
            // 'editdate',
            // 'addtime',
            // 'adddate',
            // 'auto_shelve_time:datetime',
            // 'auto_shelf_time:datetime',
            // 'auto_shelf_days',
            // 'ip',
            // 'template',
            'status',
            // 'linkurl:url',
            // 'filepath',
            // 'note',
            // 'dengji',
            // 'xuke',
            // 'biaozhun',
            // 'zuowu',
            // 'fangzhi',
            // 'yaoliang',
            // 'func',
            // 'total_func',
            // 'xianjia',
            // 'yuanjia',
            // 'priceperarea',
            // 'endtodate',
            // 'open',
            // 'chuliren',
            // 'cj',
            // 'sccs',
            // 'jifen',
            // 'shuliang',
            // 'addname',
            // 'pricebak',
            // 'priceperareabak',
            'yuanprice',
            'activeid',
            // 'actprice',
            // 'linkpid',
            // 'menshiid',
            // 'menshiprice',
            // 'minamountbak',
            // 'n1',
            // 'n2',
            // 'n3',
            // 'v1',
            // 'v2',
            // 'v3',
            // 'diprice',
            // 'indextitle',
            // 'buytimes:datetime',
            // 'disnoneprice',
            // 'buytimesall:datetime',
            // 'first_price_editor',
            // 'first_price_addtime:datetime',
            // 'daily_indulgence_yuanprice',
            // 'daily_indulgence_price',
            // 'addeditor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
