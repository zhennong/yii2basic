<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/4
 * Time: 11:21
 */

$start = strtotime('2015-08-18 00:00:00');
$end = strtotime('2015-08-19 23:59:59');
$sql = "SELECT t.buyer_mobile as mobile, m.userid, m.username, m.truename FROM ".\app\models\Trades::tableName(). " AS t LEFT JOIN ".\app\models\Members::tableName()." AS m ON t.buyer = m.username WHERE t.status IN(2, 3, 4) AND t.addtime > {$start} AND t.addtime < {$end} GROUP BY t.buyer_mobile";
$members = Yii::$app->db->createCommand($sql)->queryAll();
?>

<div class="member-has-buy-last818">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-border table-member-has-buy-last818">
                    <thead>
                    <tr>
                        <th>mobile</th>
                        <th>userid</th>
                        <th>username</th>
                        <th>truename</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($members as $k => $v): ?>
                        <tr>
                            <td><?= $v['mobile'] ?></td>
                            <td><?= $v['userid'] ?></td>
                            <td><?= $v['username'] ?></td>
                            <td><?= $v['truename'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
