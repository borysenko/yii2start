<?php
namespace common\components;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class LangWidget extends Widget{
	public $active;
	
	public function init(){
		parent::init();
		/*
                $link = (preg_replace(array('/\/(ru|en)/i','/$/'),'',$_SERVER['REQUEST_URI']));
                $pth = explode('/',$link);
				$pth = array_diff($pth, array(''));

                $base = (!empty($pth[1])) ? $pth[1] : '';

                $this->link['ru'] = !empty($link)?$link:'/';
                $this->link['en'] = '/en'.((count($pth)>0)?'/'.implode('/',$pth):'');
		*/
	}

	public function translateCurrentRequest($language)
	{
		$params = ArrayHelper::merge(
			['/' . ltrim(Yii::$app->requestedRoute, '/')],
			Yii::$app->request->getQueryParams(),
			[
				'language' => $language,
			]
		);
		return Url::to($params);
	}
	
	public function run(){
		return 	'<select>
			<option value="'.$this->translateCurrentRequest('ua').'" '.(($this->active=='ua')?'selected':'').'>UA</option>
			<option value="'.$this->translateCurrentRequest('en').'" '.(($this->active=='en')?'selected':'').'>En</option>
        </select>';
	}
}
?>