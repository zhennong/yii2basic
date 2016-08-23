<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\agents\models\Area */

$this->title = 'Update Area: ' . $model->areaid;
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->areaid, 'url' => ['view', 'id' => $model->areaid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
