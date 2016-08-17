<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 9:44
 */

namespace app\components;


class Tools
{
    /**
     * 调试输出|调试模式下
     * @param  mixed $test 调试变量
     * @param  int $style 模式
     * @param  int $stop 是否停止
     * @return void       浏览器输出
     * @author wodrow <wodrow451611cv@gmail.com | 1173957281@qq.com>
     */
    public static function _vp($test,$stop=0,$style=0)
    {
        $outDir = \Yii::getAlias('@runtime');
        switch ($style) {
            case 0:
                echo "<pre>";
                echo "<br><hr>";
                var_dump($test);
                echo "</pre>";
                break;

            case 1:
                echo "<pre>";
                echo "<br><hr>";
                var_dump($test);
                echo "<hr/>";
                for($i=0;$i<100;$i++){
                    echo $i."<hr/>";
                }
                echo "</pre>";
                break;

            case 2:
                file_put_contents($outDir . '/OUT.md', "\r" . var_export($test, true));
                break;

            case 3:
                file_put_contents($outDir . '/OUT.md', "\r\r" . var_export($test, true), FILE_APPEND);
                break;
        }
        if ($stop!=0) {
            exit("<hr/>");
        }
    }

    /**
     * 将excel转换为数组 by aibhsc
     */
    public static function format_excel2array($filePath='',$sheet=0){
        if(empty($filePath) or !file_exists($filePath)){die('file not exists');}
        $PHPReader = new \PHPExcel_Reader_Excel2007();        //建立reader对象
        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($filePath)){
                echo 'no Excel';
                return false;
            }
        }
        $PHPExcel = $PHPReader->load($filePath);        //建立excel对象
        $currentSheet = $PHPExcel->getSheet($sheet);        //**读取excel文件中的指定工作表*/
        $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
        $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
        $data = array();
        for($rowIndex=0;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
            for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
                $addr = $colIndex.$rowIndex;
                $cell = $currentSheet->getCell($addr)->getValue();
                if($cell instanceof \PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
                }
                $data[$rowIndex][$colIndex] = $cell;
            }
        }
        return $data;
    }

    /**
     * 查看图片是否存在
     */
    public static function isHasFile($filepath)
    {
        if (file_exists($filepath)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function get404path()
    {
        $jpg404Url = \Yii::$app->params['dtUrl']."404.jpg";
        return $jpg404Url;
    }

    /**
     * 把返回的数据集转换成Tree
     * @param array $list 要转换的数据集
     * @param string $pid parent标记字段
     * @param string $level level标记字段
     * @return array
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function list2tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
        // 创建Tree
        $tree = [];
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = [];
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }

    /**
     * 将list2tree的树还原成列表
     * @param  array $tree  原来的树
     * @param  string $child 孩子节点的键
     * @param  string $order 排序显示的键，一般是主键 升序排列
     * @param  array  $list  过渡用的中间数组，
     * @return array        返回排过序的列表数组
     * @author yangweijie <yangweijiester@gmail.com>
     */
    public static function tree2list($tree, $child = '_child', $order='id', &$list = []){
        if(is_array($tree)) {
            $refer = [];
            foreach ($tree as $key => $value) {
                $reffer = $value;
                if(isset($reffer[$child])){
                    unset($reffer[$child]);
                    self::tree2list($value[$child], $child, $order, $list);
                }
                $list[] = $reffer;
            }
            $list = self::list_sort_by($list, $order, $sortby='asc');
        }
        return $list;
    }

    /**
     * 字符串转换为数组，主要用于把分隔符调整到第二个参数
     * @param  string $str  要分割的字符串
     * @param  string $glue 分割符
     * @return array
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function str2arr($str, $glue = ','){
        return explode($glue, $str);
    }

    /**
     * 数组转换为字符串，主要用于把分隔符调整到第二个参数
     * @param  array  $arr  要连接的数组
     * @param  string $glue 分割符
     * @return string
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public static function arr2str($arr, $glue = ','){
        return implode($glue, $arr);
    }
}