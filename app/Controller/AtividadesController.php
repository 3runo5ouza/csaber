<?php
App::uses('AppController', 'Controller');

class AtividadesController extends AppController {

	public $components = array('Session', 'Paginator');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'index');
    }

	public function index() {
        $this->Atividade->recursive = 0;
        $atividades = $this->Atividade->find('all');
		$materias = $this->Atividade->Materia->find('list');
		$this->set(compact('atividades', 'materias'));
	}

	public function listaTag($id, $tag)
	{
		$conditions = array(array('AtividadeTag.tag_id' => $id));		
		$atividades = $this->Atividade->AtividadeTag->find('all', array('conditions' => $conditions));
		$usuarios = $this->Atividade->Usuario->find('list');
		$materias = $this->Atividade->Materia->find('list');
		$this->set(compact('atividades', 'materias', 'tag', 'usuarios'));
	}

	public function listaMateria($id, $materia)
	{
		$conditions = array(array('Atividade.materia_id' => $id));
		$usuarios = $this->Atividade->Usuario->find('list');
		$atividades = $this->Atividade->find('all', array('conditions' => $conditions));
		$this->set(compact('atividades', 'materia', 'usuarios'));
	}
	
	public function view($id = null) {
		if (!$this->Atividade->exists($id)) {
			throw new NotFoundException(__('Invalid atividade'));
		}

		$options = array('conditions' => array('Atividade.' . $this->Atividade->primaryKey => $id));
		$this->set('atividade', $this->Atividade->find('first', $options));
	}

	public function add($materia_id = null) {
		if (!empty($this->data)) {
			$this->Atividade->create();
			$this->request->data['Atividade']['usuario_id'] = intval($this->Auth->user('id'));
			if ($this->Atividade->save($this->data)) {
				$this->Session->setFlash(__('The atividade has been saved.'));
				//$log = $this->Atividade->getDataSource()->getLog(false, false);debug($log);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A atividade não pode ser salva. Tente novamente'));
			}
		}

		$materias = $this->Atividade->Materia->find('list');
		$tags = $this->Atividade->Tag->find('list');
		$usuarios = $this->Atividade->Usuario->find('list');
		$this->set(compact('materias', 'tags', 'usuarios'));
	}

	public function edit($id = null) {
		if (!$this->Atividade->exists($id)) {
			throw new NotFoundException(__('Invalid atividade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Atividade->save($this->request->data)) {
				$this->Session->setFlash(__('The atividade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atividade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Atividade.' . $this->Atividade->primaryKey => $id));
			$this->request->data = $this->Atividade->find('first', $options);
			debug($this->request->data);
		}
		$materias = $this->Aluno->Materias->find('list');
		$this->set(compact('materias'));
	}

	public function delete($id = null) {
		$this->Atividade->id = $id;
		if (!$this->Atividade->exists()) {
			throw new NotFoundException(__('Invalid atividade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Atividade->delete()) {
			$this->Session->setFlash(__('The atividade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The atividade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function sendFile($file) {
		$this->autoRender->false;
	    $this->response->file('img/'.$file);
	    return $this->response;
	}

	public function favoritar($atividade) {
		//TODO: Arrumar esta bagaça
		$this->autoRender->false;
	    /*$this->Atividade->Favorita->create();
	    $this->request->data['Favorita']['usuario_id'] = intval($this->Auth->user('id'));
	    $this->request->data['Favorita']['atividade_id'] = $atividade;
		$this->Atividade->Favorita->save($this->data);*/
	    return ;
	}

	public function minhasAtividades()
	{
		$options['conditions'] = array('Atividade.usuario_id' => $this->Auth->user('id'));
		$atividades = $this->Atividade->find('all', $options);
		$this->set(compact('atividades'));
	}

}
