<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\components\grid\EnumColumn;
use app\modules\agents\models\AreaManageAssign;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\agents\models\AreaManageAssignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Area Manage Assigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-manage-assign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=\yii2mod\alert\Alert::widget() ?>

    <p>
        <?//= Html::a('Create Area Manage Assign', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('随机分配地区', ['assign'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'area_id',
            'area_name',
            [
                'class'=>EnumColumn::className(),
                'attribute'=>'manager_id',
                'enum'=>AreaManageAssign::getManagerIds(),
                'filter'=>AreaManageAssign::getManagerIds(),
            ],
            [
                'class'=>EnumColumn::className(),
                'attribute'=>'manager',
                'enum'=>AreaManageAssign::getManagers(),
                'filter'=>AreaManageAssign::getManagers(),
            ],
            [
                'class'=>EnumColumn::className(),
                'attribute'=>'manager_name',
                'enum'=>AreaManageAssign::getManagerNames(),
                'filter'=>AreaManageAssign::getManagerNames(),
            ],

            [
                'class'=>EnumColumn::className(),
                'attribute'=>'fasten',
                'enum'=>AreaManageAssign::getFasten(),
                'filter'=>AreaManageAssign::getFasten(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
