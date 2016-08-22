<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%depart}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $fzarea
 * @property integer $bumen
 * @property integer $listorder
 * @property integer $commonarea
 * @property integer $bharea
 * @property integer $marketid
 */
class Depart extends \yii\db\ActiveRecord
{
    const DEPART_NONE = 0;
    const TRADING_DEPARTMENT = 1; //交易部
    const AFTER_SALES_DEPARTMENT = 2; //售后部
    const PRODUCT_DEPARTMENT = 3; //产品部
    const ADMINISTRATOR = 4; //管理员
    const FINANCE_DEPRATMENT = 5; //财务部
    const FREIGHT_DEPRATMENT = 6; //货运部

    public static function getDepartment()
    {
        return [
            self::DEPART_NONE => '无',
            self::TRADING_DEPARTMENT => '交易部',
            self::AFTER_SALES_DEPARTMENT => '售后部',
            self::PRODUCT_DEPARTMENT => '产品部',
            self::ADMINISTRATOR => '管理员',
            self::FINANCE_DEPRATMENT => '财务部',
            self::FREIGHT_DEPRATMENT => '货运部',
        ];
    }
    
    public static function tableName()
    {
        return '{{%depart}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'listorder', 'commonarea', 'bharea', 'marketid'], 'required'],
            [['fzarea'], 'string'],
            [['bumen', 'listorder', 'commonarea', 'bharea', 'marketid'], 'integer'],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'fzarea' => 'Fzarea',
            'bumen' => 'Bumen',
            'listorder' => 'Listorder',
            'commonarea' => 'Commonarea',
            'bharea' => 'Bharea',
            'marketid' => 'Marketid',
        ];
    }
}
