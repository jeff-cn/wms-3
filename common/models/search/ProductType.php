<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductType as ProductTypeModel;

/**
 * ProductType represents the model behind the search form of `common\models\ProductType`.
 */
class ProductType extends ProductTypeModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idParent'], 'integer'],
            [['name', 'createdAt', 'updatedAt', 'deletedAt'], 'safe'],
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
        $query = ProductTypeModel::find();

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
            'id' => $this->id,
            'idParent' => $this->idParent,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
