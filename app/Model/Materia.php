<?php
App::uses('AppModel', 'Model');
/**
 * Materia Model
 *
 * @property Atividade $Atividade
 */
class Materia extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Atividade' => array(
			'className' => 'Atividade',
			'foreignKey' => 'materia_id',
			'dependent' => false,
		)
	);

}
