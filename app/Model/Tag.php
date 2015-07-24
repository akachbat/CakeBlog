<?php

class Tag extends AppModel{
	//relations
	public $hasAndBelongsToMany = 'Post';
	//validation
	public $validates = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'champs obligatoire !'
		)
	);
	//
	public $recursive = -1;

}	