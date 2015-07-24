<?php

class Post extends AppModel{
	public $belongsTo =  array('User','Category');
	public $hasAndBelongsToMany = 'Tag';
	public $hasMany = array(
		'Comment' => array(
			'order' => 'Comment.created DESC',
			'conditions' => array('Comment.active' => 1)
		)
	);
	//Data
	public $recursive = -1;
	public $order = array('Post.created' => 'DESC');
	//behaviors
	public $actsAs = array('Containable');
	//validattion
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'champs obligatoire'
		),
		'author_id' => array(
			'rule' => 'notEmpty',
			'message' => 'champs obligatoire'
		),
		'category_id' => array(
			'rule' => 'notEmpty',
			'message' => 'champs obligatoire'
		),			
		'content' => array(
			'rule' => 'notEmpty',
			'message' => 'champs obligatoire'
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

	public function afterSave($created, $options = array()){
		//nettoyer le cache
		Cache::clear();
	}		
}	