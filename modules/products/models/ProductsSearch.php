<?php

namespace app\modules\products\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\products\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `app\modules\products\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'mycatid', 'typeid', 'areaid', 'pid', 'level', 'elite', 'price', 'days', 'hits', 'groupid', 'vip', 'validated', 'totime', 'edittime', 'addtime', 'auto_shelve_time', 'auto_shelf_time', 'auto_shelf_days', 'status', 'total_func', 'sccs', 'jifen', 'shuliang', 'activeid', 'menshiid', 'menshiprice', 'minamountbak', 'buytimes', 'disnoneprice', 'buytimesall', 'first_price_addtime'], 'integer'],
            [['catid', 'title', 'style', 'introduce', 'model', 'standard', 'brand', 'unit', 'tag', 'keyword', 'pptword', 'old_img', 'thumb', 'thumb1', 'thumb2', 'username', 'company', 'truename', 'telephone', 'mobile', 'address', 'email', 'msn', 'qq', 'ali', 'skype', 'editor', 'editdate', 'adddate', 'ip', 'template', 'linkurl', 'filepath', 'note', 'dengji', 'xuke', 'biaozhun', 'zuowu', 'fangzhi', 'yaoliang', 'func', 'priceperarea', 'endtodate', 'open', 'chuliren', 'cj', 'addname', 'priceperareabak', 'linkpid', 'n1', 'n2', 'n3', 'v1', 'v2', 'v3', 'indextitle', 'first_price_editor', 'addeditor'], 'safe'],
            [['fee', 'minamount', 'amount', 'xianjia', 'yuanjia', 'pricebak', 'yuanprice', 'actprice', 'diprice', 'daily_indulgence_yuanprice', 'daily_indulgence_price'], 'number'],
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
        $query = Products::find();

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
            'itemid' => $this->itemid,
            'mycatid' => $this->mycatid,
            'typeid' => $this->typeid,
            'areaid' => $this->areaid,
            'pid' => $this->pid,
            'level' => $this->level,
            'elite' => $this->elite,
            'fee' => $this->fee,
            'price' => $this->price,
            'minamount' => $this->minamount,
            'amount' => $this->amount,
            'days' => $this->days,
            'hits' => $this->hits,
            'groupid' => $this->groupid,
            'vip' => $this->vip,
            'validated' => $this->validated,
            'totime' => $this->totime,
            'edittime' => $this->edittime,
            'editdate' => $this->editdate,
            'addtime' => $this->addtime,
            'adddate' => $this->adddate,
            'auto_shelve_time' => $this->auto_shelve_time,
            'auto_shelf_time' => $this->auto_shelf_time,
            'auto_shelf_days' => $this->auto_shelf_days,
            'status' => $this->status,
            'total_func' => $this->total_func,
            'xianjia' => $this->xianjia,
            'yuanjia' => $this->yuanjia,
            'sccs' => $this->sccs,
            'jifen' => $this->jifen,
            'shuliang' => $this->shuliang,
            'pricebak' => $this->pricebak,
            'yuanprice' => $this->yuanprice,
            'activeid' => $this->activeid,
            'actprice' => $this->actprice,
            'menshiid' => $this->menshiid,
            'menshiprice' => $this->menshiprice,
            'minamountbak' => $this->minamountbak,
            'diprice' => $this->diprice,
            'buytimes' => $this->buytimes,
            'disnoneprice' => $this->disnoneprice,
            'buytimesall' => $this->buytimesall,
            'first_price_addtime' => $this->first_price_addtime,
            'daily_indulgence_yuanprice' => $this->daily_indulgence_yuanprice,
            'daily_indulgence_price' => $this->daily_indulgence_price,
        ]);

        $query->andFilterWhere(['like', 'catid', $this->catid])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'style', $this->style])
            ->andFilterWhere(['like', 'introduce', $this->introduce])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'standard', $this->standard])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'pptword', $this->pptword])
            ->andFilterWhere(['like', 'old_img', $this->old_img])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'thumb1', $this->thumb1])
            ->andFilterWhere(['like', 'thumb2', $this->thumb2])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'truename', $this->truename])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'msn', $this->msn])
            ->andFilterWhere(['like', 'qq', $this->qq])
            ->andFilterWhere(['like', 'ali', $this->ali])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'linkurl', $this->linkurl])
            ->andFilterWhere(['like', 'filepath', $this->filepath])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'dengji', $this->dengji])
            ->andFilterWhere(['like', 'xuke', $this->xuke])
            ->andFilterWhere(['like', 'biaozhun', $this->biaozhun])
            ->andFilterWhere(['like', 'zuowu', $this->zuowu])
            ->andFilterWhere(['like', 'fangzhi', $this->fangzhi])
            ->andFilterWhere(['like', 'yaoliang', $this->yaoliang])
            ->andFilterWhere(['like', 'func', $this->func])
            ->andFilterWhere(['like', 'priceperarea', $this->priceperarea])
            ->andFilterWhere(['like', 'endtodate', $this->endtodate])
            ->andFilterWhere(['like', 'open', $this->open])
            ->andFilterWhere(['like', 'chuliren', $this->chuliren])
            ->andFilterWhere(['like', 'cj', $this->cj])
            ->andFilterWhere(['like', 'addname', $this->addname])
            ->andFilterWhere(['like', 'priceperareabak', $this->priceperareabak])
            ->andFilterWhere(['like', 'linkpid', $this->linkpid])
            ->andFilterWhere(['like', 'n1', $this->n1])
            ->andFilterWhere(['like', 'n2', $this->n2])
            ->andFilterWhere(['like', 'n3', $this->n3])
            ->andFilterWhere(['like', 'v1', $this->v1])
            ->andFilterWhere(['like', 'v2', $this->v2])
            ->andFilterWhere(['like', 'v3', $this->v3])
            ->andFilterWhere(['like', 'indextitle', $this->indextitle])
            ->andFilterWhere(['like', 'first_price_editor', $this->first_price_editor])
            ->andFilterWhere(['like', 'addeditor', $this->addeditor]);

        return $dataProvider;
    }
}
