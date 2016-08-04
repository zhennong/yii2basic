<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/4
 * Time: 10:38
 */

$trades = \app\models\Trades::find()->select(['buyer'])->where(['in', 'status', [2, 3, 4]])->asArray()->all();
$member_has_trade_ids_arr = [];
foreach($trades as $k => $v){
    $member_has_trade_ids_arr[] = $v['buyer'];
}
$member_has_trade_ids_arr = array_unique($member_has_trade_ids_arr);
$start = strtotime('2016-01-01 00:00:00');
$end = time();
$new_no_trade_members = \app\models\Members::find()
    ->select([
        'mobile',
        'userid',
        'username',
        'group_concat(truename) AS truename',
    ])
    ->where(['and', ['>', 'regtime', $start], ['<', 'regtime', $end], ['LENGTH(mobile)'=>11], ['not in', 'username', $member_has_trade_ids_arr]])
    ->groupBy(['mobile'])
    ->asArray()->all();
?>

<script>
    $(function () {
        /*var Table = $('.table-new-no-trade-member');
        var DataTable = Table.dataTable();*/
    })
</script>

<div class="new-no-trade-member">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-border table-new-no-trade-member">
                    <thead>
                    <tr>
                        <th>mobile</th>
                        <th>userid</th>
                        <th>username</th>
                        <th>truename</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($new_no_trade_members as $k => $v): ?>
                        <tr>
                            <td><?=$v['mobile'] ?></td>
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
</div>
