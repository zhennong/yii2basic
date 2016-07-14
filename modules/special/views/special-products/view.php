<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\special\models\SpecialProducts */

$this->title = $model->special_id;
$this->params['breadcrumbs'][] = ['label' => 'Special Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'special_id' => $model->special_id, 'product_id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'special_id' => $model->special_id, 'product_id' => $model->product_id], [
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
            'special_id',
            'product_id',
            'created_at',
            'updated_at',
            'status',
            'price',
            'price_bak',
        ],
    ]) ?>

</div>
