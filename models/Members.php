<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property string $userid
 * @property string $username
 * @property string $passport
 * @property string $company
 * @property string $password
 * @property double $cash
 * @property string $payword
 * @property string $email
 * @property integer $message
 * @property integer $chat
 * @property integer $sound
 * @property integer $online
 * @property integer $avatar
 * @property integer $gender
 * @property string $truename
 * @property string $mobile
 * @property string $msn
 * @property string $qq
 * @property string $ali
 * @property string $skype
 * @property string $department
 * @property string $career
 * @property integer $admin
 * @property string $role
 * @property string $aid
 * @property integer $groupid
 * @property integer $regid
 * @property string $areaid
 * @property integer $sms
 * @property integer $credit
 * @property string $money
 * @property string $locking
 * @property string $bank
 * @property string $account
 * @property string $edittime
 * @property string $regip
 * @property string $regtime
 * @property string $loginip
 * @property string $logintime
 * @property string $logintimes
 * @property string $black
 * @property integer $send
 * @property string $auth
 * @property string $authvalue
 * @property string $authtime
 * @property integer $vemail
 * @property integer $vmobile
 * @property integer $vtruename
 * @property integer $vbank
 * @property integer $vcompany
 * @property integer $vtrade
 * @property string $trade
 * @property string $support
 * @property string $inviter
 * @property string $tel
 * @property integer $is_agent
 * @property string $vip
 * @property double $bl
 * @property string $touxiang
 * @property integer $topagentid
 * @property integer $usertype
 * @property string $userbak
 * @property integer $regareaid
 * @property string $comefrom
 * @property string $begoodatcatid
 * @property integer $experttype
 */
class Members extends \yii\db\ActiveRecord
{
    const IS_NOT_AGENT = 0;
    const IS_AGENT = 1;

    public static function getAgent()
    {
        return [
            self::IS_NOT_AGENT=>'不是代理商',
            self::IS_AGENT=>'代理商',
        ];
    }

    const IS_NOT_ADMIN = 0;
    const SUPER_ADMIN = 1;
    const ORDINARY_ADMIN = 2;

    public static function getAdmin()
    {
        return [
            self::IS_NOT_ADMIN=>'不是管理员',
            self::SUPER_ADMIN=>'超级管理员',
            self::ORDINARY_ADMIN=>'普通管理员',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cash', 'tel', 'touxiang', 'topagentid', 'usertype', 'userbak', 'regareaid', 'comefrom', 'begoodatcatid', 'experttype'], 'required'],
            [['cash', 'money', 'locking', 'bl'], 'number'],
            [['message', 'chat', 'sound', 'online', 'avatar', 'gender', 'admin', 'aid', 'groupid', 'regid', 'areaid', 'sms', 'credit', 'edittime', 'regtime', 'logintime', 'logintimes', 'send', 'authtime', 'vemail', 'vmobile', 'vtruename', 'vbank', 'vcompany', 'vtrade', 'is_agent', 'vip', 'topagentid', 'usertype', 'regareaid', 'experttype'], 'integer'],
            [['username', 'passport', 'ali', 'skype', 'department', 'career', 'bank', 'account', 'inviter', 'tel'], 'string', 'max' => 30],
            [['company', 'authvalue'], 'string', 'max' => 100],
            [['password', 'payword', 'auth'], 'string', 'max' => 32],
            [['email', 'mobile', 'msn', 'regip', 'loginip', 'trade', 'support', 'comefrom'], 'string', 'max' => 50],
            [['truename', 'qq'], 'string', 'max' => 20],
            [['role', 'black', 'touxiang', 'begoodatcatid'], 'string', 'max' => 255],
            [['userbak'], 'string', 'max' => 155],
            [['username'], 'unique'],
            [['passport'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'username' => 'Username',
            'passport' => 'Passport',
            'company' => 'Company',
            'password' => 'Password',
            'cash' => 'Cash',
            'payword' => 'Payword',
            'email' => 'Email',
            'message' => 'Message',
            'chat' => 'Chat',
            'sound' => 'Sound',
            'online' => 'Online',
            'avatar' => 'Avatar',
            'gender' => 'Gender',
            'truename' => 'Truename',
            'mobile' => 'Mobile',
            'msn' => 'Msn',
            'qq' => 'Qq',
            'ali' => 'Ali',
            'skype' => 'Skype',
            'department' => 'Department',
            'career' => 'Career',
            'admin' => 'Admin',
            'role' => 'Role',
            'aid' => 'Aid',
            'groupid' => 'Groupid',
            'regid' => 'Regid',
            'areaid' => 'Areaid',
            'sms' => 'Sms',
            'credit' => 'Credit',
            'money' => 'Money',
            'locking' => 'Locking',
            'bank' => 'Bank',
            'account' => 'Account',
            'edittime' => 'Edittime',
            'regip' => 'Regip',
            'regtime' => 'Regtime',
            'loginip' => 'Loginip',
            'logintime' => 'Logintime',
            'logintimes' => 'Logintimes',
            'black' => 'Black',
            'send' => 'Send',
            'auth' => 'Auth',
            'authvalue' => 'Authvalue',
            'authtime' => 'Authtime',
            'vemail' => 'Vemail',
            'vmobile' => 'Vmobile',
            'vtruename' => 'Vtruename',
            'vbank' => 'Vbank',
            'vcompany' => 'Vcompany',
            'vtrade' => 'Vtrade',
            'trade' => 'Trade',
            'support' => 'Support',
            'inviter' => 'Inviter',
            'tel' => '固定电话',
            'is_agent' => '当添加代理商如果会员不存在，插入的记录此变量为1，默认为0',
            'vip' => 'vip级别',
            'bl' => '比例',
            'touxiang' => '头像',
            'topagentid' => 'Topagentid',
            'usertype' => 'Usertype',
            'userbak' => 'Userbak',
            'regareaid' => 'Regareaid',
            'comefrom' => 'Comefrom',
            'begoodatcatid' => 'Begoodatcatid',
            'experttype' => 'Experttype',
        ];
    }
}
