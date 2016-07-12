<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\products\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'catid') ?>

    <?= $form->field($model, 'mycatid') ?>

    <?= $form->field($model, 'typeid') ?>

    <?= $form->field($model, 'areaid') ?>

    <?php // echo $form->field($model, 'pid') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'elite') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'style') ?>

    <?php // echo $form->field($model, 'fee') ?>

    <?php // echo $form->field($model, 'introduce') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'standard') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'minamount') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'days') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'pptword') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'old_img') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'thumb1') ?>

    <?php // echo $form->field($model, 'thumb2') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'groupid') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'vip') ?>

    <?php // echo $form->field($model, 'validated') ?>

    <?php // echo $form->field($model, 'truename') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'msn') ?>

    <?php // echo $form->field($model, 'qq') ?>

    <?php // echo $form->field($model, 'ali') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'totime') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'edittime') ?>

    <?php // echo $form->field($model, 'editdate') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'adddate') ?>

    <?php // echo $form->field($model, 'auto_shelve_time') ?>

    <?php // echo $form->field($model, 'auto_shelf_time') ?>

    <?php // echo $form->field($model, 'auto_shelf_days') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'template') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'linkurl') ?>

    <?php // echo $form->field($model, 'filepath') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'dengji') ?>

    <?php // echo $form->field($model, 'xuke') ?>

    <?php // echo $form->field($model, 'biaozhun') ?>

    <?php // echo $form->field($model, 'zuowu') ?>

    <?php // echo $form->field($model, 'fangzhi') ?>

    <?php // echo $form->field($model, 'yaoliang') ?>

    <?php // echo $form->field($model, 'func') ?>

    <?php // echo $form->field($model, 'total_func') ?>

    <?php // echo $form->field($model, 'xianjia') ?>

    <?php // echo $form->field($model, 'yuanjia') ?>

    <?php // echo $form->field($model, 'priceperarea') ?>

    <?php // echo $form->field($model, 'endtodate') ?>

    <?php // echo $form->field($model, 'open') ?>

    <?php // echo $form->field($model, 'chuliren') ?>

    <?php // echo $form->field($model, 'cj') ?>

    <?php // echo $form->field($model, 'sccs') ?>

    <?php // echo $form->field($model, 'jifen') ?>

    <?php // echo $form->field($model, 'shuliang') ?>

    <?php // echo $form->field($model, 'addname') ?>

    <?php // echo $form->field($model, 'pricebak') ?>

    <?php // echo $form->field($model, 'priceperareabak') ?>

    <?php // echo $form->field($model, 'yuanprice') ?>

    <?php // echo $form->field($model, 'activeid') ?>

    <?php // echo $form->field($model, 'actprice') ?>

    <?php // echo $form->field($model, 'linkpid') ?>

    <?php // echo $form->field($model, 'menshiid') ?>

    <?php // echo $form->field($model, 'menshiprice') ?>

    <?php // echo $form->field($model, 'minamountbak') ?>

    <?php // echo $form->field($model, 'n1') ?>

    <?php // echo $form->field($model, 'n2') ?>

    <?php // echo $form->field($model, 'n3') ?>

    <?php // echo $form->field($model, 'v1') ?>

    <?php // echo $form->field($model, 'v2') ?>

    <?php // echo $form->field($model, 'v3') ?>

    <?php // echo $form->field($model, 'diprice') ?>

    <?php // echo $form->field($model, 'indextitle') ?>

    <?php // echo $form->field($model, 'buytimes') ?>

    <?php // echo $form->field($model, 'disnoneprice') ?>

    <?php // echo $form->field($model, 'buytimesall') ?>

    <?php // echo $form->field($model, 'first_price_editor') ?>

    <?php // echo $form->field($model, 'first_price_addtime') ?>

    <?php // echo $form->field($model, 'daily_indulgence_yuanprice') ?>

    <?php // echo $form->field($model, 'daily_indulgence_price') ?>

    <?php // echo $form->field($model, 'addeditor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
