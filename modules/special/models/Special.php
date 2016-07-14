<?php

namespace app\modules\special\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%special}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $status
 */
class Special extends \yii\db\ActiveRecord
{
    const STATUS_DEFAULT = 0;

    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
            ]
        ];
    }

    public static function tableName()
    {
        return '{{%special}}';
    }

    public static function getStatus()
    {
        return [
            self::STATUS_DEFAULT=>'默认',
        ];
    }

    public function rules()
    {
        return [
            [['title',], 'required'],
            [['start_at', 'end_at', ], 'filter', 'filter' => 'strtotime'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            return true;
        }else{
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '专题标题',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'start_at' => '开始时间',
            'end_at' => '结束时间',
            'status' => '状态',
        ];
    }
}
