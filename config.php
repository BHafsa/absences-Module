<?php

use humhub\widgets\TopMenu;
return [
	'id' => 'absences',
	'class' => 'humhub\modules\absences\Module',
	'namespace' => 'humhub\modules\absences',
	'events' =>[
		['class' => TopMenu::classname(), 'event' => TopMenu::EVENT_INIT ,'callback' =>['humhub\modules\absences\Events'	,'onTopMenuInit']
	]
	]

]
	
;

?>