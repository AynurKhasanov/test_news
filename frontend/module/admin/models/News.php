<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id_news
 * @property string $name_news
 * @property string $date_news
 * @property string $text_news
 * @property integer $theme_news
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_news', 'date_news', 'text_news', 'theme_news'], 'required'],
            [['date_news'], 'safe'],
            [['text_news'], 'string'],
            [['theme_news'], 'integer'],
            [['name_news'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_news' => 'Id News',
            'name_news' => 'Name News',
            'date_news' => 'Date News',
            'text_news' => 'Text News',
            'theme_news' => 'Theme News',
        ];
    }
    
    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id_theme' => 'theme_news']);
    }
}
