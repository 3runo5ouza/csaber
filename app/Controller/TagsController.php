<?php

App::uses('AppController', 'Controller');

class TagsController extends AppController {

	public $components = array('Session');

    

    public function isAuthorized($user){
        
        return true;
    }


    public function index() {
        $this->Tag->recursive = 0;
        $this->set('tags', $this->paginate());
    }
}