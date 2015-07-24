<?php 

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $displayField = 'username';
    //relation
    public $hasMany = 'Post';
    //validations
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '"Username" obligatoire'
            ),
            'unicity' => array(
                'rule' => 'isUnique',
                'message' => 'Ce Username déja existé !'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Mot de psse obligatoire'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'user')),
                'message' => 'Choississez un role valide',
                'allowEmpty' => false
            )
        )
    );

    /**
    *   So, now every time a user is saved, the password is hashed using the BlowfishPasswordHasher class
    **/
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }    
}