<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%finance_trade}}".
 *
 * @property string $itemid
 * @property string $buyer
 * @property string $seller
 * @property string $title
 * @property string $note
 * @property string $thumb
 * @property string $linkurl
 * @property string $production_time
 * @property string $buyer_name
 * @property integer $buyer_areaid
 * @property string $buyer_address
 * @property string $buyer_phone
 * @property string $buyer_mobile
 * @property string $buyer_mail
 * @property string $buyer_receive
 * @property string $send_type
 * @property string $send_no
 * @property string $send_time
 * @property string $addtime
 * @property string $updatetime
 * @property integer $paytime
 * @property integer $deliverytime
 * @property string $editor
 * @property string $buyer_reason
 * @property string $refund_reason
 * @property integer $status
 * @property string $order
 * @property string $pay
 * @property string $wuliu
 * @property string $wuliu1
 * @property string $wuliubz
 * @property integer $addressid
 * @property integer $p_id
 * @property integer $total
 * @property double $price
 * @property double $amount
 * @property integer $buyer_star
 * @property integer $seller_star
 * @property integer $duihuan
 * @property integer $buystatus
 * @property integer $mailsent
 * @property integer $smssent
 * @property integer $topagentid
 * @property integer $alipaystatus
 * @property string $wuliueditor
 * @property integer $linkstatus
 * @property integer $yfpayment
 * @property integer $allgoods_needdays_addtime
 * @property integer $allgoods_needdays
 * @property string $needwait
 * @property string $orderbelong
 * @property integer $zhongzhuan
 * @property double $diprice
 * @property integer $isdel
 * @property string $whodel
 * @property integer $deltime
 * @property integer $activeid
 * @property integer $marketid
 * @property string $traderdo_pay
 * @property integer $issue
 * @property integer $issue_addtime
 * @property integer $issue_finishtime
 * @property string $issue_bak
 * @property string $xunjia_ticheng
 * @property integer $print_menshiid
 * @property string $menshiids
 * @property integer $zhongzhuan_arrived
 * @property integer $active_type
 * @property integer $prolong_days
 * @property string $trade_remark
 */
class Trades extends \yii\db\ActiveRecord
{
    const STATUS_TRADE_CREAT = 0;
    const STATUS_WAIT_PAY = 1;
    const STATUS_BUYER_PAY = 2;
    const STATUS_DELIVER = 3;
    const STATUS_SUCCESS = 4;
    const STATUS_APLAY_FOR_REFUND = 5;
    const STATUS_HAS_REFUND_TO_BUYER = 6;
    const STATUS_HAS_PAY = 7;
    const STATUS_BUYER_CLOSE = 8;
    const STATUS_SELLER_CLOSE = 9;
    const STATUS_IN_PROCESS = 10;
    const STATUS_HAS_REMIND_TO_BUYER = 11;

    // 订单状态
    public static function getStatus()
    {
        return [
            self::STATUS_TRADE_CREAT=>'买家发起订单,等待卖家确认',
            self::STATUS_WAIT_PAY=>'卖家已确认订单,等待买家付款',
            self::STATUS_BUYER_PAY=>'买家已付款,等待卖家发货',
            self::STATUS_DELIVER=>'卖家已发货,等待买家确认',
            self::STATUS_SUCCESS=>'交易成功',
            self::STATUS_APLAY_FOR_REFUND=>'买家申请退款',
            self::STATUS_HAS_REFUND_TO_BUYER=>'已退款给买家',
            self::STATUS_HAS_PAY=>'已付款给卖家',
            self::STATUS_BUYER_CLOSE=>'买家关闭交易',
            self::STATUS_SELLER_CLOSE=>'卖家关闭交易',
            self::STATUS_IN_PROCESS=>'订单处理中',
            self::STATUS_HAS_REMIND_TO_BUYER=>'已通知客户提货，7日后将交易将自动完成',
        ];
    }

    const AUTO_RECEIPT_DAYS = 60; // 自动确认收货天数
    const AUTO_RECEIPT_REMIND_DAYS_30 = 30; // 自动确认收货提醒天数
    const AUTO_RECEIPT_REMIND_DAYS_57 = 57; // 自动确认收货提醒天数
    const PROLONG_DAYS = 7; // 延长收货天数

    const ACTIVE_TYPE_NULL = 0; // 不是活动
    const ACTIVE_TYPE_DAILY = 1; // 每日特价
    const ACTIVE_TYPE_ACT = 2; //活动

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%finance_trade}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buyer_areaid', 'buyer_mobile', 'buyer_mail', 'paytime', 'buyer_reason', 'refund_reason', 'order', 'pay', 'wuliu', 'wuliu1', 'addressid', 'p_id', 'total', 'price', 'duihuan', 'topagentid', 'alipaystatus', 'linkstatus', 'yfpayment', 'allgoods_needdays_addtime', 'allgoods_needdays', 'needwait', 'zhongzhuan', 'diprice', 'isdel', 'whodel', 'deltime', 'activeid', 'marketid', 'traderdo_pay', 'issue', 'issue_addtime', 'issue_finishtime', 'issue_bak', 'xunjia_ticheng', 'print_menshiid', 'menshiids', 'zhongzhuan_arrived'], 'required'],
            [['buyer_areaid', 'addtime', 'updatetime', 'paytime', 'deliverytime', 'status', 'addressid', 'p_id', 'total', 'buyer_star', 'seller_star', 'duihuan', 'buystatus', 'mailsent', 'smssent', 'topagentid', 'alipaystatus', 'linkstatus', 'yfpayment', 'allgoods_needdays_addtime', 'allgoods_needdays', 'zhongzhuan', 'isdel', 'deltime', 'activeid', 'marketid', 'issue', 'issue_addtime', 'issue_finishtime', 'print_menshiid', 'zhongzhuan_arrived', 'active_type', 'prolong_days'], 'integer'],
            [['buyer_reason', 'refund_reason', 'trade_remark'], 'string'],
            [['price', 'amount', 'diprice'], 'number'],
            [['buyer', 'seller', 'editor', 'traderdo_pay'], 'string', 'max' => 30],
            [['title', 'note', 'pay', 'wuliu', 'issue_bak'], 'string', 'max' => 100],
            [['thumb', 'linkurl', 'production_time', 'wuliubz'], 'string', 'max' => 255],
            [['buyer_name', 'buyer_phone', 'buyer_mobile', 'send_time'], 'string', 'max' => 20],
            [['buyer_address'], 'string', 'max' => 200],
            [['buyer_mail', 'buyer_receive', 'send_type', 'send_no', 'wuliueditor', 'needwait', 'orderbelong', 'whodel', 'xunjia_ticheng', 'menshiids'], 'string', 'max' => 50],
            [['order'], 'string', 'max' => 40],
            [['wuliu1'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => '交易ID',
            'buyer' => '买家账号',
            'seller' => '卖家账号',
            'title' => '产品名称',
            'note' => '产品规格',
            'thumb' => '产品缩略图',
            'linkurl' => '产品链接',
            'production_time' => '报货的产品生产日期',
            'buyer_name' => '买家姓名',
            'buyer_areaid' => '买家地区ID',
            'buyer_address' => '买家详细地址',
            'buyer_phone' => '买家电话',
            'buyer_mobile' => '买家手机',
            'buyer_mail' => '买家邮箱',
            'buyer_receive' => '无用',
            'send_type' => '无用',
            'send_no' => '无用',
            'send_time' => '无用',
            'addtime' => '交易创建时间',
            'updatetime' => '最后更新时间',
            'paytime' => '付款时间',
            'deliverytime' => 'Deliverytime',
            'editor' => 'Editor',
            'buyer_reason' => 'Buyer Reason',
            'refund_reason' => 'Refund Reason',
            'status' => 'Status',
            'order' => '订单编号',
            'pay' => '支付方式',
            'wuliu' => '物流运输',
            'wuliu1' => '物流编号',
            'wuliubz' => 'Wuliubz',
            'addressid' => 'Addressid',
            'p_id' => 'P ID',
            'total' => ' 购买数量',
            'price' => '单价',
            'amount' => 'Amount',
            'buyer_star' => 'Buyer Star',
            'seller_star' => 'Seller Star',
            'duihuan' => '兑换物品标示',
            'buystatus' => '暂时还没有用到此字段。-2013-2-21',
            'mailsent' => 'Mailsent',
            'smssent' => 'Smssent',
            'topagentid' => 'Topagentid',
            'alipaystatus' => 'Alipaystatus',
            'wuliueditor' => 'Wuliueditor',
            'linkstatus' => 'Linkstatus',
            'yfpayment' => 'Yfpayment',
            'allgoods_needdays_addtime' => 'Allgoods Needdays Addtime',
            'allgoods_needdays' => 'Allgoods Needdays',
            'needwait' => 'Needwait',
            'orderbelong' => 'Orderbelong',
            'zhongzhuan' => 'Zhongzhuan',
            'diprice' => 'Diprice',
            'isdel' => 'Isdel',
            'whodel' => 'Whodel',
            'deltime' => 'Deltime',
            'activeid' => 'Activeid',
            'marketid' => 'Marketid',
            'traderdo_pay' => 'Traderdo Pay',
            'issue' => 'Issue',
            'issue_addtime' => 'Issue Addtime',
            'issue_finishtime' => 'Issue Finishtime',
            'issue_bak' => 'Issue Bak',
            'xunjia_ticheng' => 'Xunjia Ticheng',
            'print_menshiid' => ' 打印门市ID',
            'menshiids' => '门市ID集合',
            'zhongzhuan_arrived' => '中转收到否',
            'active_type' => '活动类型',
            'prolong_days' => '延长收货天数',
            'trade_remark' => '订单备注',
        ];
    }
}
