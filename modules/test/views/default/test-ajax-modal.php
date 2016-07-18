<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 18:18
 */
use yii\bootstrap\Modal;
use yii\helpers\Html;

?>
<div class="test-default-test-ajax-modal">
    <?=Html::a('test', '#', [
        'id' => 'test',
        'data-toggle' => 'modal',
        'data-target' => '#test-modal',
        'class' => 'btn btn-success test1',
        'data-id'=>'88819',
    ]) ?>
</div>
<?php Modal::begin([
    "id" => "test-modal",
    "header"=>"test",
    "footer" => "",// always need it for jquery plugin
]);

$requestUpdateUrl = "http://localhost/yii2basic/index.php?r=products%2Fproducts%2Fview";
$updateJs = <<<JS
$('.test1').on('click', function () {
$.get('{$requestUpdateUrl}', { id: $("#test").data('id') },
function (data) {
$('.modal-body').html(data);
} 
);
});
JS;

$this->registerJs($updateJs);

Modal::end() ?>

