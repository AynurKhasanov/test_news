<?php

namespace app\module\admin\models;

use Yii;
use app\module\admin\models\news;

/**
 * This is the model class for table "theme".
 *
 * @property integer $id_theme
 * @property string $name_theme
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_theme'], 'required'],
            [['name_theme'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_theme' => 'Id Theme',
            'name_theme' => 'Name Theme',
        ];
    }
    
    
}
