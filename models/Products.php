<?php

namespace app\models;

use app\components\Tools;
use Yii;

/**
 * This is the model class for table "{{%sell_5}}".
 *
 * @property string $itemid
 * @property string $catid
 * @property string $mycatid
 * @property integer $type
 * @property integer $special_id
 * @property integer $typeid
 * @property integer $areaid
 * @property string $pid
 * @property integer $level
 * @property integer $elite
 * @property string $title
 * @property string $style
 * @property double $fee
 * @property string $introduce
 * @property string $model
 * @property string $standard
 * @property string $brand
 * @property string $unit
 * @property string $price
 * @property double $minamount
 * @property double $amount
 * @property integer $days
 * @property string $tag
 * @property string $keyword
 * @property string $pptword
 * @property string $hits
 * @property string $old_img
 * @property string $thumb
 * @property string $thumb1
 * @property string $thumb2
 * @property string $username
 * @property integer $groupid
 * @property string $company
 * @property integer $vip
 * @property integer $validated
 * @property string $truename
 * @property string $telephone
 * @property string $mobile
 * @property string $address
 * @property string $email
 * @property string $msn
 * @property string $qq
 * @property string $ali
 * @property string $skype
 * @property string $totime
 * @property string $editor
 * @property string $edittime
 * @property string $editdate
 * @property string $addtime
 * @property string $adddate
 * @property integer $auto_shelve_time
 * @property integer $auto_shelf_time
 * @property integer $auto_shelf_days
 * @property string $ip
 * @property string $template
 * @property integer $status
 * @property string $linkurl
 * @property string $filepath
 * @property string $note
 * @property string $dengji
 * @property string $xuke
 * @property string $biaozhun
 * @property string $zuowu
 * @property string $fangzhi
 * @property string $yaoliang
 * @property string $func
 * @property integer $total_func
 * @property double $xianjia
 * @property double $yuanjia
 * @property string $priceperarea
 * @property string $endtodate
 * @property string $open
 * @property string $chuliren
 * @property string $cj
 * @property integer $sccs
 * @property integer $jifen
 * @property integer $shuliang
 * @property string $addname
 * @property string $pricebak
 * @property string $priceperareabak
 * @property string $yuanprice
 * @property integer $activeid
 * @property string $actprice
 * @property string $linkpid
 * @property integer $menshiid
 * @property integer $menshiprice
 * @property integer $minamountbak
 * @property string $n1
 * @property string $n2
 * @property string $n3
 * @property string $v1
 * @property string $v2
 * @property string $v3
 * @property double $diprice
 * @property string $indextitle
 * @property integer $buytimes
 * @property integer $disnoneprice
 * @property integer $buytimesall
 * @property string $first_price_editor
 * @property integer $first_price_addtime
 * @property double $daily_indulgence_yuanprice
 * @property double $daily_indulgence_price
 * @property string $addeditor
 */
class Products extends \yii\db\ActiveRecord
{
    const STATUS_RECYCLE_BIN = 0;
    const STATUS_FAILED = 1;
    const STATUS_WAITING_FOR_REVIEW = 2;
    const STATUS_SHELVE = 3;
    const STATUS_EXPIRED = 4;
    const STATUS_SHELF = 5;
    const STATUS_AUTO_SHELF_BY_DAYS = 6; // 自动下架产品
    const STATUS_NO_PICTURE = 7; // 暂时没有图片的产品

    public static function getStatus()
    {
        return [
            self::STATUS_RECYCLE_BIN => '回收站',
            self::STATUS_FAILED => '审核未通过',
            self::STATUS_WAITING_FOR_REVIEW => '等待审核',
            self::STATUS_SHELVE => '上架发布',
            self::STATUS_EXPIRED => '过期',
            self::STATUS_SHELF => '临时下架',
            self::STATUS_AUTO_SHELF_BY_DAYS => '自动下架产品',
            self::STATUS_NO_PICTURE => '暂时没有图片的产品',
        ];
    }

    const AUTO_SHELF_BY_DAYS = 2150; //计时下架天数

    const TYPE_DEFAULT = 0;
    const TYPE_BOUTIQUE = 1; // 精品

    public static function getTpye()
    {
        return [
            self::TYPE_DEFAULT=>'默认',
            self::TYPE_BOUTIQUE=>'精品',
        ];
    }
    
    public static function tableName()
    {
        return '{{%sell_5}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mycatid', 'type', 'special_id', 'typeid', 'areaid', 'pid', 'level', 'elite', 'price', 'days', 'hits', 'groupid', 'vip', 'validated', 'totime', 'edittime', 'addtime', 'auto_shelve_time', 'auto_shelf_time', 'auto_shelf_days', 'status', 'total_func', 'sccs', 'jifen', 'shuliang', 'activeid', 'menshiid', 'menshiprice', 'minamountbak', 'buytimes', 'disnoneprice', 'buytimesall', 'first_price_addtime'], 'integer'],
            [['fee', 'minamount', 'amount', 'xianjia', 'yuanjia', 'pricebak', 'yuanprice', 'actprice', 'diprice', 'daily_indulgence_yuanprice', 'daily_indulgence_price'], 'number'],
            [['old_img', 'dengji', 'xuke', 'biaozhun', 'zuowu', 'fangzhi', 'yaoliang', 'func', 'total_func', 'xianjia', 'yuanjia', 'priceperarea', 'endtodate', 'open', 'jifen', 'shuliang', 'addname', 'pricebak', 'yuanprice', 'activeid', 'actprice', 'menshiid', 'diprice', 'buytimes', 'disnoneprice', 'buytimesall', 'first_price_editor', 'first_price_addtime', 'daily_indulgence_yuanprice', 'daily_indulgence_price', 'addeditor'], 'required'],
            [['editdate', 'adddate'], 'safe'],
            [['catid', 'introduce', 'keyword', 'pptword', 'old_img', 'thumb', 'thumb1', 'thumb2', 'address', 'linkurl', 'filepath', 'note', 'dengji', 'xuke', 'biaozhun', 'zuowu', 'fangzhi', 'yaoliang', 'func', 'priceperareabak'], 'string', 'max' => 255],
            [['title', 'model', 'standard', 'brand', 'tag', 'company', 'linkpid', 'n1', 'n2', 'n3', 'v1', 'v2', 'v3'], 'string', 'max' => 100],
            [['style', 'telephone', 'mobile', 'email', 'msn', 'ip', 'cj', 'addname', 'first_price_editor', 'addeditor'], 'string', 'max' => 50],
            [['unit'], 'string', 'max' => 10],
            [['username', 'truename', 'ali', 'skype', 'editor', 'template', 'endtodate', 'chuliren'], 'string', 'max' => 30],
            [['qq'], 'string', 'max' => 20],
            [['priceperarea'], 'string', 'max' => 300],
            [['open'], 'string', 'max' => 500],
            [['indextitle'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => 'Itemid',
            'catid' => '分类ID',
            'mycatid' => '无用',
            'type' => 'Type',
            'special_id' => 'Special ID',
            'typeid' => '无用',
            'areaid' => '发布地区ID',
            'pid' => 'Pid',
            'level' => '推荐等级',
            'elite' => '无用',
            'title' => '产品标题',
            'style' => '无用',
            'fee' => '无用',
            'introduce' => '简介',
            'model' => '产品成分',
            'standard' => '产品规格',
            'brand' => '防治对象',
            'unit' => '计量单位',
            'price' => '产品售价',
            'minamount' => '最小起定量',
            'amount' => '库存量(无用)',
            'days' => '发货期限',
            'tag' => '产品名称',
            'keyword' => '产品关键词',
            'pptword' => 'Pptword',
            'hits' => '浏览次数',
            'old_img' => '老网站的大图',
            'thumb' => '产品图片1',
            'thumb1' => '产品图片2',
            'thumb2' => '产品图片3',
            'username' => '店铺账号',
            'groupid' => '组ID(企业为6)',
            'company' => '公司名称',
            'vip' => '无用',
            'validated' => '无用',
            'truename' => '无用',
            'telephone' => '无用',
            'mobile' => '无用',
            'address' => '无用',
            'email' => '无用',
            'msn' => 'Msn',
            'qq' => '无用',
            'ali' => '无用',
            'skype' => '无用',
            'totime' => 'Totime',
            'editor' => '编辑人',
            'edittime' => '编辑时间',
            'editdate' => '编辑日期',
            'addtime' => '产品添加时间',
            'adddate' => '添加日期',
            'auto_shelve_time' => 'Auto Shelve Time',
            'auto_shelf_time' => 'Auto Shelf Time',
            'auto_shelf_days' => '计时下架天数',
            'ip' => 'Ip',
            'template' => 'Template',
            'status' => '产品状态 3是上架',
            'linkurl' => '产品链接',
            'filepath' => '无用',
            'note' => '无用',
            'dengji' => '登记证号PD',
            'xuke' => '生产许可证号',
            'biaozhun' => '产品标准证',
            'zuowu' => '作物或范围',
            'fangzhi' => '防治对象',
            'yaoliang' => '制剂用药量',
            'func' => '使用方法',
            'total_func' => '有多少条使用方法',
            'xianjia' => '无用',
            'yuanjia' => '无用',
            'priceperarea' => '各地区价格',
            'endtodate' => '防止的作物',
            'open' => 'Open',
            'chuliren' => '处理人',
            'cj' => '生产厂家',
            'sccs' => '收藏次数',
            'jifen' => '所需积分',
            'shuliang' => '兑换的数量',
            'addname' => '管理员',
            'pricebak' => '价格备份',
            'priceperareabak' => '各地区价格的备份',
            'yuanprice' => '原价(活动相关)',
            'activeid' => '活动ID',
            'actprice' => '活动价',
            'linkpid' => 'Linkpid',
            'menshiid' => 'Menshiid',
            'menshiprice' => 'Menshiprice',
            'minamountbak' => 'Minamountbak',
            'n1' => 'N1',
            'n2' => 'N2',
            'n3' => 'N3',
            'v1' => 'V1',
            'v2' => 'V2',
            'v3' => 'V3',
            'diprice' => 'Diprice',
            'indextitle' => 'Indextitle',
            'buytimes' => 'Buytimes',
            'disnoneprice' => 'Disnoneprice',
            'buytimesall' => 'Buytimesall',
            'first_price_editor' => 'First Price Editor',
            'first_price_addtime' => 'First Price Addtime',
            'daily_indulgence_yuanprice' => 'Daily Indulgence Yuanprice',
            'daily_indulgence_price' => 'Daily Indulgence Price',
            'addeditor' => 'Addeditor',
        ];
    }

    /**
     * @param $thumb
     * 判断是否存在缩略图
     */
    public static function isHasThumb($thumb)
    {
        if (!empty($thumb)){
            // 判断图片是否存在，存在返回元路径
            preg_match('/^(http:\/\/)?([^\/]+)/i',$thumb,$match);
            $num = $match[0];
            $num = strlen($num);
            $thumb_root = substr($thumb,$num);
            $file_path = Yii::$app->params['dtRoot'].$thumb_root;
            return $file_path;
            /*if(file_exists($file_path)){
                return $file_path;
            }else{
                return false;
            }*/
        }else{
            return false;
        }
    }
    
    public static function getThumbUrl($thumb)
    {
        if(self::isHasThumb($thumb)){
            return $thumb;
        }else{
            return Tools::get404path();
        }
    }
}
