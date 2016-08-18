<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18
 * Time: 16:50
 */

use app\components\Tools;
use app\models\Area;
use app\models\Members;

$province_index = Area::getProvinceIdToNameIndex();
$start_time = 1451577600;
$areas = Area::find()->select(['areaid', 'parentid'])->asArray()->all();
$province_arr = ['云南', '湖南', '湖北', '江西', '海南'];
$province_new_arr = ['浙江', '安徽', '天津', '北京', '广东', '广西', '甘肃'];
$area_tree = Tools::list2tree($areas, 'areaid', 'parentid');

foreach ($province_arr as $key => $value){
    foreach ($area_tree as $k => $v){
        if($v['areaid']==$province_index[$value]){
            $x[] = $v;
        }
    }
    $y = Tools::tree2list($x, '_child', 'areaid');
    $area_ids = [];
    foreach($y as $k => $v){
        $area_ids[] = $v['areaid'];
    }
    $members = Members::find()->select(['mobile'])->where(['and',['in','regareaid',$area_ids], ['LENGTH(mobile)'=>11]])->groupBy('mobile')->asArray()->all();
    foreach ($members as $k => $v){
        $z[] = array_merge($v,['areaname'=>$value]);
    }
}

foreach ($province_new_arr as $key => $value){
    foreach ($area_tree as $k => $v){
        if($v['areaid']==$province_index[$value]){
            $x[] = $v;
        }
    }
    $y = Tools::tree2list($x, '_child', 'areaid');
    $area_ids = [];
    foreach($y as $k => $v){
        $area_ids[] = $v['areaid'];
    }
    $members = Members::find()->select(['mobile'])->where(['and',['in','regareaid',$area_ids], 'LENGTH(mobile)'=>11, ['>','regtime',$start_time]])->groupBy('mobile')->asArray()->all();
    foreach ($members as $k => $v){
        $z[] = array_merge($v,['areaname'=>$value]);
    }
}

?>

<div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-border downlines">
                <thead>
                <tr>
                    <th>areaname</th>
                    <th>mobile</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($z as $k => $v): ?>
                    <tr>
                        <td><?=$v['areaname'] ?></td>
                        <td><?=$v['mobile'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
