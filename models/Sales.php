<?php

namespace app\models;

use app\components\Tools;
use app\modules\activity\models\ExcelTool;
use Yii;

/**
 * This is the model class for table "{{%fahuo}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $kaifaname
 * @property string $quhao
 * @property integer $kaifa
 * @property string $tel
 * @property string $bank
 * @property string $bankowner
 * @property string $bankcode
 * @property integer $type
 * @property integer $addtime
 * @property integer $edittime
 * @property string $username
 * @property string $seller
 * @property integer $marketid
 * @property integer $areaid
 */
class Sales extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%fahuo}}';
    }

    public function rules()
    {
        return [
            [['kaifa', 'type', 'addtime', 'edittime'], 'required'],
            [['kaifa', 'type', 'addtime', 'edittime', 'marketid', 'areaid'], 'integer'],
            [['title', 'quhao', 'bank'], 'string', 'max' => 100],
            [['kaifaname', 'tel', 'bankowner', 'bankcode', 'username', 'seller'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'kaifaname' => 'Kaifaname',
            'quhao' => 'Quhao',
            'kaifa' => 'Kaifa',
            'tel' => 'Tel',
            'bank' => 'Bank',
            'bankowner' => 'Bankowner',
            'bankcode' => 'Bankcode',
            'type' => 'Type',
            'addtime' => 'Addtime',
            'edittime' => 'Edittime',
            'username' => 'Username',
            'seller' => 'Seller',
            'marketid' => 'Marketid',
            'areaid' => 'Areaid',
        ];
    }

    public static function getSalesIdFromProductIdAndMarketId($product_id, $market_id)
    {
        $sales_id = 0;
        $supply_info = Supply::find()->select(['fid'])->where(['pid'=>$product_id])->all();
        foreach($supply_info as $k => $v){
            $sales_info = Sales::find()->select(['id', 'marketid'])->where(['id'=>$v['fid']])->all();
            foreach($sales_info as $k1 => $v1){
                if ($v1['marketid']==$market_id){
                    $sales_id = $v1['id'];
                }
            }
        }
        return $sales_id;
    }

    /**
     * 获取门市信息的market product 索引
     * @return mixed
     */
    public static function getAllSalesDetailFromMarketAndProduct()
    {
        $supply_detail = ExcelTool::getAllSupplyDetail();
        foreach ($supply_detail as $k => $v){
            $x[$v['market_id']][$v['product_id']]['sales_id'] = $v['sales_id']>0?$v['sales_id']:0;
            $x[$v['market_id']][$v['product_id']]['price'] = $v['price']>0?$v['price']:0;
        }
        return $x;
    }

    public static function getSalesDetailByMarketIdAndProductId($market_id, $product_id)
    {
        $all_sales = ExcelTool::getAllSalesCache();
        return isset($all_sales[$market_id][$product_id])?$all_sales[$market_id][$product_id]:false;
    }
}
