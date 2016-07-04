<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\ActiveProducts */

$this->title = 'Update Active Products: ' . $model->active_id;
$this->params['breadcrumbs'][] = ['label' => 'Active Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->active_id, 'url' => ['view', 'active_id' => $model->active_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="active-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
