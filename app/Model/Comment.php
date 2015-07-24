<?php

class Comment extends AppModel{
	//relations
	public $belongsTo = 'Post';
	//validation
	public $validate = array(
		'fullname' => array(
			'rule' => 'notEmpty',
			'message' => 'Saississez votre nom SVP'
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Adresse email n\'est pas valide'
		),
		'content' => array(
			'rule' => array('minLength', 50),
			'message' => 'Votre commentaire est trés courte !'
		)
	);
	

}	