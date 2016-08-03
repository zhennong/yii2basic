<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/1
 * Time: 18:03
 *
 * @var $model app\models\Members
 */

$downlines = \app\models\Members::findAll(['topagentid'=>$model->userid]);
?>

<?php \mootensai\components\JsBlock::begin(); ?>
<script>
    $(function () {
        var Table = $('.downlines');
        var DataTable = Table.dataTable();
    })
</script>
<?php \mootensai\components\JsBlock::end(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-border downlines">
                <thead>
                <tr>
                    <th>userid</th>
                    <th>username</th>
                    <th>truename</th>
                    <th>mobile</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($downlines as $k => $v): ?>
                <tr>
                    <td><?=$v['userid'] ?></td>
                    <td><?=$v['username'] ?></td>
                    <td><?=$v['truename'] ?></td>
                    <td><?=$v['mobile'] ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
