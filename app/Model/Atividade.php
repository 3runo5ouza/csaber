<?php
App::uses('AppModel', 'Model');


class Atividade extends AppModel {


	//public $actsAs = array('Containable');
	
	public $belongsTo = array(
		'Materia' => array(
			'className' => 'Materia',
			'foreignKey' => 'materia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasMany = array(
		'Favorita' => array(
			'className' => 'Favorita',
			'foreignKey' => 'atividade_id',
			'dependent' => false,
		),
		'AtividadeTag' => array(
			'className' => 'AtividadeTag'
		)
	);


	public $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'atividades_tags',
			'foreignKey' => 'atividade_id',
			'associationForeignKey' => 'tag_id',
			'unique' => 'keepExisting',
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'joinTable' => 'atividades_usuarios',
			'foreignKey' => 'atividade_id',
			'associationForeignKey' => 'usuario_id',
			'unique' => 'keepExisting',
		)
	);

	public function beforeSave($options = array())
	{

		// faz upload do arquivo antes de salvar os dados da atividade enviada no banco
		$data = $this->data['Atividade'];
		if(move_uploaded_file($data['arquivo']['tmp_name'], IMAGES.$data['arquivo']['name']))
			{
				$nomeExtensao = explode('.', $data['arquivo']['name']);
				$this->data['Atividade']['arquivo'] = $nomeExtensao[0];
				$this->data['Atividade']['ext'] = $nomeExtensao[1];
			}
			if(!$data['arquivo']){
				unset($data['arquivo']);
			}
	}



	public function afterSave($created, $options = array())
    {

    	// salva as tags que acompanham os dados da nova atividade enviada
        if(!empty($this->data['Atividade']['tag'])){
            $tags = explode(',', $this->data['Atividade']['tag']);
            foreach ($tags as $tag) {
                $tag = trim($tag);
                if(!empty($tag)){
                    $t = $this->Tag->findByNome($tag);
                    if(!empty($t)){
                        $this->Tag->id = $t['Tag']['id'];
                    } else {
                        $this->Tag->create();
                        $this->Tag->save(array('nome'=>$tag));
                    }
                    $this->AtividadeTag->create();
                    $this->AtividadeTag->save(array(
                        'atividade_id' => $this->id,
                        'tag_id' => $this->Tag->id));
                }
            }
            return true;
        }
    }

			
}
