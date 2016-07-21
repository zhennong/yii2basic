<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%active}}".
 *
 * @property string $id
 * @property string $title
 * @property integer $zhekou
 * @property string $starttime
 * @property string $endtime
 * @property string $addtime
 * @property string $description
 * @property integer $forcebegin
 * @property integer $changed
 */
class Active extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%active}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'zhekou', 'starttime', 'endtime', 'addtime', 'description', 'forcebegin', 'changed'], 'required'],
            [['zhekou', 'forcebegin', 'changed'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['starttime', 'endtime', 'addtime'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '活动ID',
            'title' => '活动标题',
            'zhekou' => '活动折扣',
            'starttime' => '活动开始时间',
            'endtime' => '活动结束时间',
            'addtime' => '活动添加时间',
            'description' => '活动简述',
            'forcebegin' => '是否强制开始',
            'changed' => '是否已经调价',
        ];
    }

    /**
     * 获取最新活动id
     * @return mixed
     */
    public static function getLastActiveId()
    {
        $last_active_info = self::find()->orderBy(['addtime'=>SORT_DESC])->one();
        return $last_active_info['id'];
    }
}
