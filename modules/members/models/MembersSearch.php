<?php

namespace app\modules\members\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\members\models\Members;

/**
 * MembersSearch represents the model behind the search form about `app\modules\members\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'message', 'chat', 'sound', 'online', 'avatar', 'gender', 'admin', 'aid', 'groupid', 'regid', 'areaid', 'sms', 'credit', 'edittime', 'regtime', 'logintime', 'logintimes', 'send', 'authtime', 'vemail', 'vmobile', 'vtruename', 'vbank', 'vcompany', 'vtrade', 'is_agent', 'vip', 'topagentid', 'usertype', 'regareaid', 'experttype'], 'integer'],
            [['username', 'passport', 'company', 'password', 'payword', 'email', 'truename', 'mobile', 'msn', 'qq', 'ali', 'skype', 'department', 'career', 'role', 'bank', 'account', 'regip', 'loginip', 'black', 'auth', 'authvalue', 'trade', 'support', 'inviter', 'tel', 'touxiang', 'userbak', 'comefrom', 'begoodatcatid'], 'safe'],
            [['cash', 'money', 'locking', 'bl'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Members::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
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

        return $dataProvider;
    }
}
