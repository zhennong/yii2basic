<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\promo\models\PromoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Promo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'itemid',
            'number',
            'type',
            'amount',
            'reuse',
            'editor',
            'addtime',
            'totime:datetime',
            'username',
            'updatetime:datetime',
            'ip',
            'special_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
