<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\agents\models\AreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('Create Area', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('随机分配地区', ['assign'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'areaid',
            'areaname',
            'parentid',
            'arrparentid',
            'child',
            // 'arrchildid:ntext',
            // 'listorder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
