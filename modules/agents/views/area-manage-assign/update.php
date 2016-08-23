<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\agents\models\AreaManageAssign */

$this->title = 'Update Area Manage Assign: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Area Manage Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-manage-assign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
