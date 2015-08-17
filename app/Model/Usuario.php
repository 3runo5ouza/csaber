<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


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
                'rule' => array('inList', array('admin', 'autor')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        // hash our password
        if (!empty($this->data[$this->alias]['senha'])) {
            $this->data[$this->alias]['senha'] = $passwordHasher->hash($this->data[$this->alias]['senha']);
        }
        
        // if we get a new password, hash it
        if (!empty($this->data[$this->alias]['senha_temp'])) {
            $this->data[$this->alias]['senha'] = $passwordHasher->hash($this->data[$this->alias]['senha_temp']);
        }

        return true;
    }

    /*public function beforeFind($query = array())
    {
        debug($query);
    }

    public function afterFind($results, $primary = false)
    {
        debug($_SESSION);
    }*/
}