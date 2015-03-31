<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
    	'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'login'
            ),
            'logoutRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'login',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'userModel' => 'Usuario',
                    'password' => 'senha',
                    'user' => 'nome'
                )
            )
        ),
    	'DebugKit.Toolbar',
        'Session'
    );
    public $helpers = array('Form', 'Html', 'Js');

    public function beforeFilter() { 
        $this->loadModel('Usuario');
		$this->Auth->userModel = 'Usuario';
		$this->Auth->loginAction = array('admin' => false, 'controller' => 'usuarios', 'action' => 'login');
        $this->Auth->allow('index', 'view');
	}
} 
    

