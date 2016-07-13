<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\activity\models\ActiveProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Active Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="active-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // echo Html::a('Create Active Products', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('活动产品调价', ['modify-active-products-price'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('活动门市调价', ['modify-active-sales-price'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('恢复活动产品', ['recovery-active-products-price'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('恢复门市产品', ['recovery-active-sales-price'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'active_id',
            'product_id',
            'active_price',
            'original_price',
            'price_bak',
             'market_id',
             'sales_id',
             'market_original_price',
             'market_active_price',
             'market_price_bak',
             'created_at:datetime',
             'updated_at:datetime',
             'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
