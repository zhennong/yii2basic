<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\special\models\Special */

$this->title = 'Update Special: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Specials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="special-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
