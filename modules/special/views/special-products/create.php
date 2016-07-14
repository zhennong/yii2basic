<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\special\models\SpecialProducts */

$this->title = 'Create Special Products';
$this->params['breadcrumbs'][] = ['label' => 'Special Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
