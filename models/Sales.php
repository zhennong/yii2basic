<?php

namespace app\models;

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
        $supply_info = Supply::find()->where(['pid'=>$product_id])->one();
        $sales_info = Sales::find()->where(['id'=>$supply_info['fid']])->all();
        $sales_id = 0;
        foreach($sales_info as $k => $v){
            if ($v['marketid']==$market_id){
                $sales_id = $v['id'];
            }
        }
        return $sales_id;
    }
}
