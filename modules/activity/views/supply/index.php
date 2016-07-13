<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\activity\models\SupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // echo Html::a('Create Supply', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fid',
            'cj',
            'product',
            'standard',
            'price',
            'activeid',
            'yuanprice',
            // 'actprice',
            // 'isfahuo',
            // 'editor',
            // 'addtime:datetime',
            // 'username',
            // 'edittime:datetime',
            // 'type',
            // 'yjarea',
            'pid',
            // 'linkpid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
