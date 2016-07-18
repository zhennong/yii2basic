<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 18:00
 */
use yii\widgets\Pjax;
use yii\helpers\Html;
?>

<? Pjax::begin()?>
<?=Html::a('time',['pjax-time'],['class'=>'btn btn-lg btn-primary'])?>
<h3>Current Time:<?=$time?></h3>
<? Pjax::end()?>
