<?php

App::uses('Model', 'Model');

class Contact extends AppModel{
	public $useTable = false;
	//validation
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Veuillez renseigner votre nom'
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Adresse email n\'est pas valide'
		),
		'message' => array(
			'rule' => 'notEmpty',
			'message' => 'Veuillez renseigner votre message'
		)

	);
	

}	