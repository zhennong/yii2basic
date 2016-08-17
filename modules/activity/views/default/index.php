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
        <a class="btn btn-primary active_products_excel_import" href="<?= Yii::$app->urlManager->createUrl('activity/default/excel-import-active-products') ?>">excel导入活动产品</a>
    </p>
</div>
