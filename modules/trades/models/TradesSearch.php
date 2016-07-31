<?php

namespace app\modules\trades\models;

use app\components\Tools;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\trades\models\Trades;

/**
 * TradesSearch represents the model behind the search form about `app\modules\trades\models\Trades`.
 */
class TradesSearch extends Trades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'buyer_areaid', 'addtime', 'updatetime', 'paytime', 'deliverytime', 'status', 'addressid', 'p_id', 'total', 'buyer_star', 'seller_star', 'duihuan', 'buystatus', 'mailsent', 'smssent', 'topagentid', 'alipaystatus', 'linkstatus', 'yfpayment', 'allgoods_needdays_addtime', 'allgoods_needdays', 'zhongzhuan', 'isdel', 'deltime', 'activeid', 'marketid', 'issue', 'issue_addtime', 'issue_finishtime', 'print_menshiid', 'zhongzhuan_arrived', 'active_type', 'prolong_days'], 'integer'],
            [['buyer', 'seller', 'title', 'note', 'thumb', 'linkurl', 'production_time', 'buyer_name', 'buyer_address', 'buyer_phone', 'buyer_mobile', 'buyer_mail', 'buyer_receive', 'send_type', 'send_no', 'send_time', 'editor', 'buyer_reason', 'refund_reason', 'order', 'pay', 'wuliu', 'wuliu1', 'wuliubz', 'wuliueditor', 'needwait', 'orderbelong', 'whodel', 'traderdo_pay', 'issue_bak', 'xunjia_ticheng', 'menshiids', 'trade_remark'], 'safe'],
            [['price', 'amount', 'diprice'], 'number'],
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
        $query = Trades::find();

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

        Tools::_vp((double)$this->amount,0,2);

        // grid filtering conditions
        $query->andFilterWhere([
            'itemid' => $this->itemid,
            'buyer_areaid' => $this->buyer_areaid,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
            'paytime' => $this->paytime,
            'deliverytime' => $this->deliverytime,
            'status' => $this->status,
            'addressid' => $this->addressid,
            'p_id' => $this->p_id,
            'total' => $this->total,
            'price' => $this->price,
            'amount' => $this->amount,
            'buyer_star' => $this->buyer_star,
            'seller_star' => $this->seller_star,
            'duihuan' => $this->duihuan,
            'buystatus' => $this->buystatus,
            'mailsent' => $this->mailsent,
            'smssent' => $this->smssent,
            'topagentid' => $this->topagentid,
            'alipaystatus' => $this->alipaystatus,
            'linkstatus' => $this->linkstatus,
            'yfpayment' => $this->yfpayment,
            'allgoods_needdays_addtime' => $this->allgoods_needdays_addtime,
            'allgoods_needdays' => $this->allgoods_needdays,
            'zhongzhuan' => $this->zhongzhuan,
            'diprice' => $this->diprice,
            'isdel' => $this->isdel,
            'deltime' => $this->deltime,
            'activeid' => $this->activeid,
            'marketid' => $this->marketid,
            'issue' => $this->issue,
            'issue_addtime' => $this->issue_addtime,
            'issue_finishtime' => $this->issue_finishtime,
            'print_menshiid' => $this->print_menshiid,
            'zhongzhuan_arrived' => $this->zhongzhuan_arrived,
            'active_type' => $this->active_type,
            'prolong_days' => $this->prolong_days,
        ]);

        $query->andFilterWhere(['like', 'buyer', $this->buyer])
            ->andFilterWhere(['like', 'seller', $this->seller])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'linkurl', $this->linkurl])
            ->andFilterWhere(['like', 'production_time', $this->production_time])
            ->andFilterWhere(['like', 'buyer_name', $this->buyer_name])
            ->andFilterWhere(['like', 'buyer_address', $this->buyer_address])
            ->andFilterWhere(['like', 'buyer_phone', $this->buyer_phone])
            ->andFilterWhere(['like', 'buyer_mobile', $this->buyer_mobile])
            ->andFilterWhere(['like', 'buyer_mail', $this->buyer_mail])
            ->andFilterWhere(['like', 'buyer_receive', $this->buyer_receive])
            ->andFilterWhere(['like', 'send_type', $this->send_type])
            ->andFilterWhere(['like', 'send_no', $this->send_no])
            ->andFilterWhere(['like', 'send_time', $this->send_time])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'buyer_reason', $this->buyer_reason])
            ->andFilterWhere(['like', 'refund_reason', $this->refund_reason])
            ->andFilterWhere(['like', 'order', $this->order])
            ->andFilterWhere(['like', 'pay', $this->pay])
            ->andFilterWhere(['like', 'wuliu', $this->wuliu])
            ->andFilterWhere(['like', 'wuliu1', $this->wuliu1])
            ->andFilterWhere(['like', 'wuliubz', $this->wuliubz])
            ->andFilterWhere(['like', 'wuliueditor', $this->wuliueditor])
            ->andFilterWhere(['like', 'needwait', $this->needwait])
            ->andFilterWhere(['like', 'orderbelong', $this->orderbelong])
            ->andFilterWhere(['like', 'whodel', $this->whodel])
            ->andFilterWhere(['like', 'traderdo_pay', $this->traderdo_pay])
            ->andFilterWhere(['like', 'issue_bak', $this->issue_bak])
            ->andFilterWhere(['like', 'xunjia_ticheng', $this->xunjia_ticheng])
            ->andFilterWhere(['like', 'menshiids', $this->menshiids])
            ->andFilterWhere(['like', 'trade_remark', $this->trade_remark]);

        return $dataProvider;
    }
}
