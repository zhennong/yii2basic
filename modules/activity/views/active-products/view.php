<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\ActiveProducts */

$this->title = $model->active_id;
$this->params['breadcrumbs'][] = ['label' => 'Active Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="active-products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'active_id' => $model->active_id, 'product_id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'active_id' => $model->active_id, 'product_id' => $model->product_id], [
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
        ],
    ]) ?>

</div>
