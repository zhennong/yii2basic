<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%area}}".
 *
 * @property string $areaid
 * @property string $areaname
 * @property string $parentid
 * @property string $arrparentid
 * @property integer $child
 * @property string $arrchildid
 * @property integer $listorder
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%area}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid', 'child', 'listorder'], 'integer'],
            [['arrchildid'], 'required'],
            [['arrchildid'], 'string'],
            [['areaname'], 'string', 'max' => 50],
            [['arrparentid'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'areaid' => 'Areaid',
            'areaname' => 'Areaname',
            'parentid' => 'Parentid',
            'arrparentid' => 'Arrparentid',
            'child' => 'Child',
            'arrchildid' => 'Arrchildid',
            'listorder' => 'Listorder',
        ];
    }

    public static function getProvinceIdToNameIndex()
    {
        $provinces = self::find()->select(['areaid', 'areaname'])->where(['<', 'areaid', 35])->asArray()->all();
        $province_index = ArrayHelper::map($provinces, 'areaname', 'areaid');
        return $province_index;
    }
}
