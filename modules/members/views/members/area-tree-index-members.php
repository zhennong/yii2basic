<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18
 * Time: 16:50
 */

use Yii;
use app\components\Tools;
use app\models\Area;
use app\models\Members;

$province_index = Area::getProvinceIdToNameIndex();
$areas = Area::find()->select(['areaid', 'parentid'])->asArray()->all();
$area_tree = Tools::list2tree($areas, 'areaid', 'parentid');
foreach ($area_tree as $k => $v){
    if($v['areaid']==$province_index['云南']){
        $x[] = $v;
    }
}
$y = Tools::tree2list($x, '_child', 'areaid');
$area_ids = [];
foreach($y as $k => $v){
    $area_ids[] = $v['areaid'];
}
$members = Members::find()->select(['mobile'])->where(['and',['in','regareaid',$area_ids], ['LENGTH(mobile)'=>11]])->groupBy('mobile')->asArray()->all();
?>

<div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-border downlines">
                <thead>
                <tr>
                    <th>mobile</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($members as $k => $v): ?>
                    <tr>
                        <td><?=$v['mobile'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
