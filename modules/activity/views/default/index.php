<?php $this->beginBlock('extends') ?>
<script>
    $(function () {
//        $(".active_products_import").on("click", function(){
//            alert(1);
//        })
    })
</script>
<?php $this->endBlock() ?>

<div class="activity-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl('activity/active-products') ?>">活动产品列表</a>
        <a class="btn btn-primary active_products_import" href="<?= Yii::$app->urlManager->createUrl('activity/default/import-acrive-products') ?>">批量导入活动产品</a>
        <a class="btn btn-primary active_products_excel_import" href="<?= Yii::$app->urlManager->createUrl('activity/default/excel-import-active-products') ?>">excel导入活动产品</a>
    </p>
    <br>
    <h1>活动产品预览</h1>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td>活动id</td>
            <td>产品id</td>
            <td>产品名称</td>
            <td>产品规格</td>
            <td>当前价格</td>
            <td>活动价</td>
            <td>原价</td>
            <td>农化市场ID</td>
            <td>门市ID</td>
            <td>农化市场</td>
            <td>门市</td>
            <td>门市原价格</td>
            <td>门市价格</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($staticActiveProducts as $k => $v): ?>
            <tr>
                <td><?= $v['active_id'] ?></td>
                <td><?= $v['product_id'] ?></td>
                <td><?= $v['product_info']['title'] ?></td>
                <td><?= $v['product_info']['standard'] ?></td>
                <td><?= $v['product_info']['price'] ?></td>
                <td><?= $v['active_price'] ?></td>
                <td><?= $v['original_price'] ?></td>
                <?php if ($v['market_id'] > 0): ?>
                    <td><?= $v['market_id'] ?></td>
                    <td><?= $v['sales_id'] ?></td>
                    <td><?= $v['market_info']['name'] ?></td>
                    <td><?= $v['sales_info']['title'] ?></td>
                    <td><?= $v['market_original_price'] ?></td>
                    <td><?= $v['market_active_price'] ?></td>
                    <?php else: ?>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
