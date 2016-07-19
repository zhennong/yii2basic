<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 8:59
 */
use app\components\Tools;
?>

<script>
    $(function () {
        var TableShow = $(".activity-default-show-excel-active-products table");
        var DataTableShow = TableShow.DataTable({});
        TableShow.css({width:'auto'});
    })
</script>

<div class="activity-default-show-excel-active-products">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <?php foreach($excel_header as $k => $v): ?>
                <td><?=$v ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach($excel_title as $k => $v): ?>
                <td><?=$v ?></td>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($excel_body as $k => $v): ?>
            <tr>
            <?php foreach($v as $key => $value): ?>
                <td><?=$value ?></td>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
