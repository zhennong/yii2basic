<?php

namespace app\modules\activity\models;

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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fahuo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kaifa', 'type', 'addtime', 'edittime'], 'required'],
            [['kaifa', 'type', 'addtime', 'edittime', 'marketid', 'areaid'], 'integer'],
            [['title', 'quhao', 'bank'], 'string', 'max' => 100],
            [['kaifaname', 'tel', 'bankowner', 'bankcode', 'username', 'seller'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
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
}
