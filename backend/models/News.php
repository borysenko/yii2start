<?php

namespace backend\models;

use Yii;
use common\components\Translite;
use common\components\resize;
use yii\web\UploadedFile;

class News extends \yii\db\ActiveRecord
{
	public $old_image;
        
	public static function tableName()
    {
        return 'news';
    }
	
	public function rules()
	{
		return [
			[['title_ru','date'], 'required'],
			[['old_image','body_ru','top','translit','meta_title_ru','meta_keywords_ru','meta_description_ru','title_en','body_en','meta_title_en','meta_keywords_en','meta_description_en'], 'safe'],
                        [['image'], 'file', 'extensions'=>'jpg, gif, png', 'skipOnEmpty'=>true],

                    ];
	}	
	
	public function attributeLabels()
	{
		return [
			'title_ru'=>'Название',
			'body_ru'=>'Описание',
			'title_en'=>'Название en',
			'body_en'=>'Описание en',                    
			'date'=>'Дата',
                        'image'=>'Изображения',
			'top'=>'ТОП новость'
		];
	}
        
	public function beforeSave($insert) {
		if (!$this->translit)
			$this->translit = Translite::rusencode($this->title_ru);
                
                
		if($image = UploadedFile::getInstance($this,'image')){			

                        $this->deleteImage($this->old_image);
                        //$this->image = $image;
			$this->image = time() . '_' . rand(1, 1000) . '.' . $image->extension;

                        $image->saveAs(Yii::getAlias('@frontend/web/upload/news/'.$this->image));
			
			$resizeObj = new resize(Yii::getAlias('@frontend/web/upload/news/'.$this->image));
			$resizeObj -> resizeImage(347, 245, 'crop');
                        $resizeObj -> saveImage(Yii::getAlias('@frontend/web/upload/news/ico/'.$this->image), 100);
			$resizeObj -> resizeImage(743, 372, 'crop');
                        $resizeObj -> saveImage(Yii::getAlias('@frontend/web/upload/news/big/'.$this->image), 100);
		}else $this->image = $this->old_image;                

		return parent::beforeSave($insert);
	}
        
        public function beforeDelete() {
            $this->deleteImage($this->image); 
            return parent::beforeDelete();
        }
        
        public function deleteImage($file){ 
                        if(!empty($file)){
                            @unlink(Yii::getAlias('@frontend/web/upload/news/'.$file));
                            @unlink(Yii::getAlias('@frontend/web/upload/news/ico/'.$file));
                            @unlink(Yii::getAlias('@frontend/web/upload/news/big/'.$file));
                        }            
        }        
	

}

