<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\trades\models\Trades */

$this->title = 'Update Trades: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Trades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->itemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
