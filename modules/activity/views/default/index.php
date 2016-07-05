<div class="activity-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        <a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('activity/active-products') ?>">活动产品列表</a>
        <a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('activity/active-products') ?>">批量导入活动产品</a>
    </p>
</div>
