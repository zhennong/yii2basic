<div class="activity-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        <a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('activity/active-products') ?>">活动产品列表</a>
        <a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('activity/active-products') ?>">批量导入活动产品</a>
    </p>
    <br>
    <h1>活动产品预览</h1>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td>活动id</td>
            <td>产品id</td>
            <td>活动价</td>
            <td>原价</td>
            <td>农化市场ID</td>
            <td>门市ID</td>
            <td>门市原价格</td>
            <td>门市价格</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($staticActiveProducts as $k => $v): ?>
            <tr>
                <td><?=$v['active_id'] ?></td>
                <td><?=$v['product_id'] ?></td>
                <td><?=$v['active_price'] ?></td>
                <td><?=$v['original_price'] ?></td>
                <td><?=$v['market_id'] ?></td>
                <td><?=$v['sales_id'] ?></td>
                <td><?=$v['market_original_price'] ?></td>
                <td><?=$v['market_active_price'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
