<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/16
 * Time: 10:03
 */

namespace app\modules\activity\models;


use yii\base\Model;
use yii\web\UploadedFile;

class ExcelUploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'excel文件',
        ];
    }
}

