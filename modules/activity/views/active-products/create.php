<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\ActiveProducts */

$this->title = 'Create Active Products';
$this->params['breadcrumbs'][] = ['label' => 'Active Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="active-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
