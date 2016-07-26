<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:32
 */

namespace app\assets;


use yii\web\AssetBundle;

class MetisMenuAsset extends AssetBundle
{
    public $css = [
        '//cdn.bootcss.com/metisMenu/2.5.2/metisMenu.min.css',
    ];
    
    public $js = [
        '//cdn.bootcss.com/metisMenu/2.5.2/metisMenu.min.js',
    ];
}