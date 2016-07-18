<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%finance_promo}}".
 *
 * @property string $itemid
 * @property string $number
 * @property integer $type
 * @property double $amount
 * @property integer $reuse
 * @property string $editor
 * @property string $addtime
 * @property string $totime
 * @property string $username
 * @property string $updatetime
 * @property string $ip
 * @property integer $special_type
 */
class Promo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%finance_promo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'reuse', 'addtime', 'totime', 'updatetime', 'special_type'], 'integer'],
            [['amount'], 'number'],
            [['number', 'editor', 'username'], 'string', 'max' => 30],
            [['ip'], 'string', 'max' => 50],
            [['number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => 'Itemid',
            'number' => 'Number',
            'type' => 'Type',
            'amount' => 'Amount',
            'reuse' => 'Reuse',
            'editor' => 'Editor',
            'addtime' => 'Addtime',
            'totime' => 'Totime',
            'username' => 'Username',
            'updatetime' => 'Updatetime',
            'ip' => 'Ip',
            'special_type' => 'Special Type',
        ];
    }
}
