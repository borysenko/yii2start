<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LangUrlManager
 *
 * @author Ekstazi
 * @ver 1.2
 */
namespace common\components\urlManager;
use yii\web\UrlManager;
use Yii; 
class LangUrlManager extends UrlManager{
    public $languages=array('en');
	public $lang='ua';
    public $langParam='language';

	

    public function createUrl($params=array()){
		
        if(!isset($params[$this->langParam])){ if(Yii::$app->language != $this->lang)$params[$this->langParam]=(Yii::$app->language=='ru') ? 'ua' : Yii::$app->language;}
		else if($params[$this->langParam] == $this->lang)unset($params[$this->langParam]);

		
        return parent::createUrl($params);
    }
    //put your code here
}