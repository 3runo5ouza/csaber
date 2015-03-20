<?php
App::uses('AppController', 'Controller');

class AtividadesController extends AppController {

	public $components = array('Session', 'Paginator');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'view', 'index', 'searchTag');
    }

	public function index() {
        $this->Atividade->recursive = 0;
		$this->set('atividades', $this->Atividade->find('all'));
	}

	public function searchTag($id)
	{
		
		$conditions = array(     		
	    		array('AtividadeTag.tag_id' => $id)
        	);		
		$atividades = $this->Atividade->AtividadeTag->find('all', array('conditions' => $conditions));
		$this->loadModel('Materia');
		$materias = $this->Materia->find('list');
		$tag = $atividades[0]['Tag']['nome'];
		$this->set(compact('atividades', 'materias', 'tag'));
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
			
			//$data['materia_id']=1;

			
			if ($this->Atividade->save($this->data)) {
				$this->Session->setFlash(__('The atividade has been saved.'));
				//$log = $this->Atividade->getDataSource()->getLog(false, false);debug($log);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atividade could not be saved. Please, try again.'));
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
		}

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

	public function sendFile($file, $ext) {
		$this->autoRender->false;
	    $this->response->file('img/'.$file.'.'.$ext);
	    return $this->response;
	}
}
