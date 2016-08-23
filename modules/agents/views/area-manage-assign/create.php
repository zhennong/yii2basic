<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\agents\models\AreaManageAssign */

$this->title = 'Create Area Manage Assign';
$this->params['breadcrumbs'][] = ['label' => 'Area Manage Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-manage-assign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
