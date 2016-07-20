<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11
 * Time: 18:29
 */

?>

<div class="activity-default-products">
    <h1>导入检测</h1>
    <?php if(count($messages)>0): ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>产品id</td>
            <td>问题</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $k => $v): ?>
            <tr>
                <td><?=$v['product_id'] ?></td>
                <td><?=$v['msg'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>没有问题产品，你可以进行<a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('activity/default/modify-active-products') ?>">导入活动数据</a></p>
    <?php endif; ?>
</div>
