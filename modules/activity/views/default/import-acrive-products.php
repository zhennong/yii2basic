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
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td>产品id</td>
            <td>问题</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $k => $v): ?>
            <tr class="<?=$v['type'] ?>">
                <td><?=$v['product_id'] ?></td>
                <td><?=$v['msg'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
