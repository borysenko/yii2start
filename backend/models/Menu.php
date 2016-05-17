<?php

namespace backend\models;


class Menu extends \yii\db\ActiveRecord
{
	
	public static function tableName()
    {
        return 'menu';
    }
	
	public function rules()
	{
		return [
			[['name_ru'], 'required'],
			[['url','sort','name_en'], 'safe'],
		];
	}	
	
	public function attributeLabels()
	{
		return [
			'url'=>'Url',
			'name_ru'=>'Название',
                        'name_en'=>'Название en',
			'sort'=>'Сорт.',
		];
	}
	

}
