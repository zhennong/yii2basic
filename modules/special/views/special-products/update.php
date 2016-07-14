<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\special\models\SpecialProducts */

$this->title = 'Update Special Products: ' . $model->special_id;
$this->params['breadcrumbs'][] = ['label' => 'Special Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->special_id, 'url' => ['view', 'special_id' => $model->special_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="special-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
