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
}