<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Registro extends AppModel {

	public $useTable = 'usuarios';

	public $validate = array(
        'nome' => array(
            'obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'Um nome de usuário é obrigatório'
            ),
            'ehUnico' => array(
                'rule' => 'isUnique',
                'message' => 'Esse nome já existe.'
            )
        ),
        'senha' => array(
            'obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'A senha é obrigatória'
            )
        ),
        'papel' => array(
            'valido' => array(
                'rule' => array('inList', array('admin', 'autor')),
                'message' => 'Entre um papel válido',
                'allowEmpty' => false
            )
        ),
        'confirmacao_senha' => array(
        	'obrigatorio' => array(
        		'rule' => 'notEmpty',
        		'message' => 'Coloque sua senha novamente para confirmá-la'
        	),
    		'coincide' => array(
        		'rule' => 'senhaCoincide',
        		'message' => 'As senhas não coincidem.'
        	)
        )
    );

	public function senhaCoincide($check) 
    {
        return $this->data[$this->alias]['senha'] === $check['confirmacao_senha']; 
    } 

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


}