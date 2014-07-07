<?php

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginTitles extends Plugin {

    // Объявление переопределений (модули, мапперы и сущности)
    protected $aInherits=array(
        'entity'  => array('ModuleTopic_EntityTopic'=>'_ModuleTopic_EntityTopic')
    );

    // Активация плагина
    public function Activate() {
        return true;
    }

    // Деактивация плагина
    public function Deactivate(){
        return true;
    }
	
	// Конструктор класса
	public function __construct() {
		$this->aDelegates=array(
			'template' =>array(
				'topic_link.tpl'=>'_topic_link.tpl'
			),
		);
	}

    // Инициализация плагина
    public function Init() {}
}
?>
