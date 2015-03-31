<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Atividade $Atividade
 */
class Tag extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	public $actsAs = array('Containable');

	public $hasAndBelongsToMany = array(
		'Atividade' => array(
			'className' => 'Atividade',
			'joinTable' => 'atividades_tags',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'atividade_id',
			'unique' => 'keepExisting',
		)
	);

}
