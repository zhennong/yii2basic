<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\promo\models\Promo */

$this->title = 'Update Promo: ' . $model->itemid;
$this->params['breadcrumbs'][] = ['label' => 'Promos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->itemid, 'url' => ['view', 'id' => $model->itemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
