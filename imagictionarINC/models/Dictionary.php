<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "dictionary".
 *
 * @property int $id
 * @property string $term
 * @property string $language
 * @property string $translation
 */
class Dictionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dictionary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term', 'translation'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 6],
            [['term', 'translation', 'language'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'term' => 'Term',
            'language' => 'Language',
            'translation' => 'Translation',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(Dictionary::className(), ['id' => 'dictionary_id']);
    }

    public function fields(){
      return ['id', 'term'];
    }

    public static function translate($term = '', $lang = ''){
      $model = Self::findOne(['term' => $term, 'language' => $lang]);
      if($model){
        return $model->translation;
      }else {
        return $term;
      }
    }
}
