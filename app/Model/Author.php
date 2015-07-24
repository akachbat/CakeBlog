<?php

class Author extends AppModel{
	public $hasMany = 'Post';
	public $validate = array(
		'fullname' => array(
			'rule' => 'notEmpty',
			'message' => 'Champs est obligatoire'
		),
		'login' => array(
			'rule' => array('minLength', 4),
			'message' => '%d caractéres au min'
		),
		'password' => array(
			'rule' => array('minLength', 4),
			'message' => '%d caractéres au min'
		)				
	);



}	