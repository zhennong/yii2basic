<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


app\assets\AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="nongyao-layout">

    <?=$content ?>

</div>
<?php $this->endBody() ?>
<?=$this->blocks['extends'] ?>
<script>
    $(".content-wrapper").attr('style',"min-height:auto");
</script>
</body>
</html>
<?php $this->endPage() ?>
