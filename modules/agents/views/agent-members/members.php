<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/22
 * Time: 15:02
 */
/**
 * @var $this \yii\web\View
 * @var $manages \app\models\Depart
 */
?>

<div class="members">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-border table-hover">
                <thead>
                <tr>
                    <th>用户id</th>
                    <th>用户名</th>
                    <th>用户姓名</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($manages as $k => $v): ?>
                    <tr>
                        <td><?=$v['userid'] ?></td>
                        <td><?=$v['username'] ?></td>
                        <td><?=$v['truename'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
