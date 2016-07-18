<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14
 * Time: 16:56
 */

use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\icons\Icon;
use mootensai\components\JsBlock;

?>

<?php $this->beginBlock('extends'); ?>

<script>
    $(function(){
        // datatables
        var Table = $(".activity-excel-files-table");
        var DataTable = Table.DataTable({});
        // show active products excel file info
        $(".active-products-excel-info").on('click', function(){
            var url = "<?=Yii::$app->urlManager->createUrl(['activity/default/show-excel-active-products'])?>";
            var file_path = $(this).parents('tr').data('file_path');
            $.ajax({
                type:'post',
                url:url,
                data:{file_path:file_path},
                success:function (msg) {
                    alert(msg);
                }
            });
        });
    });
</script>

<?php $this->endBlock(); ?>

<div class="activity-default-excel-import-active-products">
    <h2>上传excel文件</h2>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?=Html::submitButton('上传', ['class'=>'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

    <h2>excel文件列表</h2>
    <table class="table table-bordered table-hover activity-excel-files-table">
        <thead>
        <tr>
            <th>文件名</th>
            <th>文件路径</th>
            <th>文件大小</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $k => $v): ?>
            <tr data-file_path="<?=$v['file_path'] ?>">
                <td><?=$v['file_name'] ?></td>
                <td><?=$v['file_path'] ?></td>
                <td><?=$v['file_size']/1000 ?> kb</td>
                <td>
                    <?php //Html::a('查看', Yii::$app->urlManager->createUrl(['activity/default/show-excel-active-products', 'file_path'=>$v['file_path']]), ['style'=>'color:blue', 'class'=>'active-products-excel-info']) ?>
                    <?=Html::a('查看', '#', ['style'=>'color:blue', 'class'=>'active-products-excel-info']) ?>
                    <?=Html::a('删除', Yii::$app->urlManager->createUrl(['activity/default/delete-excel-active-products', 'file_path'=>$v['file_path']]), ['style'=>'color:red']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



