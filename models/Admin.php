<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $adminid
 * @property string $userid
 * @property integer $listorder
 * @property string $title
 * @property string $url
 * @property string $style
 * @property integer $moduleid
 * @property string $file
 * @property string $action
 * @property string $catid
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'listorder', 'moduleid'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['url', 'action', 'catid'], 'string', 'max' => 255],
            [['style'], 'string', 'max' => 50],
            [['file'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adminid' => 'Adminid',
            'userid' => 'Userid',
            'listorder' => 'Listorder',
            'title' => 'Title',
            'url' => 'Url',
            'style' => 'Style',
            'moduleid' => 'Moduleid',
            'file' => 'File',
            'action' => 'Action',
            'catid' => 'Catid',
        ];
    }
}
