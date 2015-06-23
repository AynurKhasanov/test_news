<?php

namespace app\module\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\admin\models\news;

/**
 * NewsSearch represents the model behind the search form about `app\module\admin\models\news`.
 */
class NewsSearch extends news
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_news', 'theme_news'], 'integer'],
            [['name_news', 'date_news', 'text_news'], 'safe'],
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
        $query = news::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_news' => $this->id_news,
            'date_news' => $this->date_news,
            'theme_news' => $this->theme_news,
        ]);

        $query->andFilterWhere(['like', 'name_news', $this->name_news])
            ->andFilterWhere(['like', 'text_news', $this->text_news]);

        return $dataProvider;
    }
}
