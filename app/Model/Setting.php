<?php

App::uses('Model', 'Model');	

class Setting extends AppModel
{
	public $primaryKey = 'name';
	public static $availableLanguages = array('fra' => 'Français (default)', 'eng' => 'English');
	
	public function getSetting($name){
		$data = $this->read('value', $name);
		return $data['Setting']['value'];
	}

	public function setSetting($name,$value){
		return $this->save(array('name' => $name,'value' => $value));
	}
}