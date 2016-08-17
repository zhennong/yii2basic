<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%fahuo_gongying}}".
 *
 * @property integer $id
 * @property integer $fid
 * @property string $cj
 * @property string $product
 * @property string $standard
 * @property integer $price
 * @property integer $activeid
 * @property integer $yuanprice
 * @property integer $actprice
 * @property integer $isfahuo
 * @property string $editor
 * @property integer $addtime
 * @property string $username
 * @property integer $edittime
 * @property string $type
 * @property string $yjarea
 * @property integer $pid
 * @property string $linkpid
 */
class Supply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fahuo_gongying}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'isfahuo', 'editor', 'addtime', 'edittime', 'type'], 'required'],
            [['fid', 'price', 'activeid', 'yuanprice', 'actprice', 'isfahuo', 'addtime', 'edittime', 'type', 'pid'], 'integer'],
            [['cj', 'product', 'standard', 'linkpid'], 'string', 'max' => 100],
            [['editor', 'username', 'yjarea'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid' => 'Fid',
            'cj' => 'Cj',
            'product' => 'Product',
            'standard' => 'Standard',
            'price' => 'Price',
            'activeid' => 'Activeid',
            'yuanprice' => 'Yuanprice',
            'actprice' => 'Actprice',
            'isfahuo' => 'Isfahuo',
            'editor' => 'Editor',
            'addtime' => 'Addtime',
            'username' => 'Username',
            'edittime' => 'Edittime',
            'type' => 'Type',
            'yjarea' => 'Yjarea',
            'pid' => 'Pid',
            'linkpid' => 'Linkpid',
        ];
    }



    /**
     * 获取所有的供应信息
     */
    public static function getAllSupplyDetail()
    {
        $sql = "SELECT supply.pid AS product_id, sales.id AS sales_id, supply.price AS price, market.id AS market_id FROM ".self::tableName()." AS supply 
LEFT JOIN ".Sales::tableName()." AS sales ON supply.fid = sales.id
LEFT JOIN ".Market::tableName()." AS market ON sales.marketid = market.id
WHERE market.id IN(3,5,7)";
        $x = Yii::$app->db->createCommand($sql)->queryAll();
        return $x;
    }
}
