<?php

class Category extends AppModel{
	public $hasMany = 'Post';
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',			
			'message' => 'Champs est obligatoire'
		),
		'slug' => array(			            
            'unicity' => array(
            	'allowEmpty' => true,
                'rule' => 'isUnique',
                'message' => 'Slug déja existé !'
            ),
            'format' => array(
                'rule' => '/^[a-z0-9\-]+$/',
                'message' => 'Slug n\'est pas valide'
            )
		)
	);


	public function beforeSave($options = array()){
		if(
			isset($this->data[$this->alias]['slug']) &&
			empty($this->data[$this->alias]['slug'])
		){
			$this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['title'],'-'));
		}		
		return parent::beforeSave($options);
	}

}	