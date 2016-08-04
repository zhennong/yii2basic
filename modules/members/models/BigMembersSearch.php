<?php

namespace app\modules\members\models;

use app\components\Tools;
use app\models\Trades;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * MembersSearch represents the model behind the search form about `app\modules\members\models\Members`.
 */
class BigMembersSearch extends MembersSearch
{
    public $tradesCount;
    public $tradesTotal;
    public $tradesAmount;

    public $amountStart;
    public $amountEnd;

    public function rules()
    {
        $data = parent::rules();
        $data[] = [['tradesCount', 'tradesTotal', 'tradesAmount', 'amountStart', 'amountEnd'], 'double'];
        return $data;
    }

    public function search($params)
    {
        // 筛选出已消费用户，amount订单总额=》userid
        // 查找到用户电话
        $query = self::find();
        $query->select([
            self::tableName().".userid",
            self::tableName().".username",
            self::tableName().".truename",
            self::tableName().".mobile",
            "COUNT(".Trades::tableName().".itemid) AS tradesCount",
            "SUM(".Trades::tableName().".total) AS tradesTotal",
            "SUM(".Trades::tableName().".amount) AS tradesAmount",
        ])->joinWith('trades')->groupBy([
            self::tableName().".mobile",
        ])->where([
            "LENGTH(".self::tableName().".mobile)"=>11,
            Trades::tableName().".status"=>[2, 3, 4],
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['tradesCount'] = [
            'asc' => ["tradesCount" => SORT_ASC],
            'desc' => ["tradesCount" => SORT_DESC],
            'label' => 'Trades Count',
        ];
        $dataProvider->sort->attributes['tradesTotal'] = [
            'asc' => ["tradesTotal" => SORT_ASC],
            'desc' => ["tradesTotal" => SORT_DESC],
            'label' => 'Trades Total',
        ];
        $dataProvider->sort->attributes['tradesAmount'] = [
            'asc' => ["tradesAmount" => SORT_ASC],
            'desc' => ["tradesAmount" => SORT_DESC],
            'label' => 'Trades Amount',
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'userid' => $this->userid,
            'cash' => $this->cash,
            'message' => $this->message,
            'chat' => $this->chat,
            'sound' => $this->sound,
            'online' => $this->online,
            'avatar' => $this->avatar,
            'gender' => $this->gender,
            'admin' => $this->admin,
            'aid' => $this->aid,
            'groupid' => $this->groupid,
            'regid' => $this->regid,
            'areaid' => $this->areaid,
            'sms' => $this->sms,
            'credit' => $this->credit,
            'money' => $this->money,
            'locking' => $this->locking,
            'edittime' => $this->edittime,
            'regtime' => $this->regtime,
            'logintime' => $this->logintime,
            'logintimes' => $this->logintimes,
            'send' => $this->send,
            'authtime' => $this->authtime,
            'vemail' => $this->vemail,
            'vmobile' => $this->vmobile,
            'vtruename' => $this->vtruename,
            'vbank' => $this->vbank,
            'vcompany' => $this->vcompany,
            'vtrade' => $this->vtrade,
            'is_agent' => $this->is_agent,
            'vip' => $this->vip,
            'bl' => $this->bl,
            'topagentid' => $this->topagentid,
            'usertype' => $this->usertype,
            'regareaid' => $this->regareaid,
            'experttype' => $this->experttype,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'payword', $this->payword])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'truename', $this->truename])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'msn', $this->msn])
            ->andFilterWhere(['like', 'qq', $this->qq])
            ->andFilterWhere(['like', 'ali', $this->ali])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'career', $this->career])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['like', 'regip', $this->regip])
            ->andFilterWhere(['like', 'loginip', $this->loginip])
            ->andFilterWhere(['like', 'black', $this->black])
            ->andFilterWhere(['like', 'auth', $this->auth])
            ->andFilterWhere(['like', 'authvalue', $this->authvalue])
            ->andFilterWhere(['like', 'trade', $this->trade])
            ->andFilterWhere(['like', 'support', $this->support])
            ->andFilterWhere(['like', 'inviter', $this->inviter])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'touxiang', $this->touxiang])
            ->andFilterWhere(['like', 'userbak', $this->userbak])
            ->andFilterWhere(['like', 'comefrom', $this->comefrom])
            ->andFilterWhere(['like', 'begoodatcatid', $this->begoodatcatid]);

        $query->having(['>', 'tradesCount', 0]);
        $query->andHaving(['>', 'tradesTotal', 0]);
        $query->andHaving(['>', 'tradesAmount', 0]);
        if($this->tradesCount){
            $query->andHaving(['tradesCount'=>$this->tradesCount]);
        }
        if($this->tradesTotal){
            $query->andHaving(['tradesTotal'=>$this->tradesTotal]);
        }
        if($this->tradesAmount){
            $this->tradesAmount = (double)$this->tradesAmount;
            $query->andHaving(['tradesAmount'=>$this->tradesAmount]);
        }
        if($this->amountStart){
            $this->amountStart = (double)$this->amountStart;
            $query->andHaving(['>=', 'tradesAmount', $this->amountStart]);
        }
        if($this->amountEnd){
            $this->amountEnd = (double)$this->amountEnd;
            $query->andHaving(['<=', 'tradesAmount', $this->amountEnd]);
        }

        return $dataProvider;
    }
}
