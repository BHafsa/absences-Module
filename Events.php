<?php


namespace humhub\modules\absences ;
use Yii;
use yii\helpers\Url;
class Events extends \yii\base\Object
{
	public static function onAdminMenuInit($event){

	}

	public static function onTopMenuInit($event){
		$event->sender->addItem([
				'label' => 'Absences',
				'url' => Url::to(["/absences/default/index"]),
				'icon' => '<i class="fa fa-user">',
									]
		);
	}


}


?>