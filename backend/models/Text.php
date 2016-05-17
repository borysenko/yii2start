<?php

namespace backend\models;
use common\components\Translite;

class Text extends \yii\db\ActiveRecord
{
	
	public static function tableName()
    {
        return 'text';
    }
	
	public function rules()
	{
		return [
			[['title_ru'], 'required'],
			[['body_ru','body_en','translit','meta_title_ru','meta_keywords_ru','meta_description_ru','title_en','meta_title_en','meta_keywords_en','meta_description_en'], 'safe'],
		];
	}	
	
	public function attributeLabels()
	{
		return [
			'title_ru'=>'Название',
			'body_ru'=>'Описание',
			'title_en'=>'Название en',
			'body_en'=>'Описание en',                    
			'sort'=>'Сорт.',
		];
	}
        
	public function beforeSave($insert) {
		if (!$this->translit)
			$this->translit = Translite::rusencode($this->title_ru);

		return parent::beforeSave($insert);
	}        
	

}

