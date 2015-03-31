<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class Usuario extends AppModel {

    public $displayField = 'nome';

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'senha' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'papel' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data['Usuario']['senha'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data['Usuario']['senha'] = $passwordHasher->hash(
                $this->data['Usuario']['senha']
            );
        }
        return true;
    }

}