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


    public $helpers = array('Form', 'Html', 'Js');

   /* public $components = array(
    	'Auth' => array(
            'loginAction' => array('controller' => 'usuarios', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'usuarios', 'action' => 'login'
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
                    'fields' => array(
                        'username' => 'nome',
                        'password' => 'senha',
                    )
                ),
            )
        ),
    	'DebugKit.Toolbar',
        'Session'
    );*/

    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array(
                        'username' => 'nome',
                        'password' => 'senha'
                    )
                )
            ),
            'loginAction' => array('controller' => 'usuarios', 'action' => 'login'), //Not related to the problem
            'loginRedirect' => array('controller' => 'usuarios', 'action' => 'login'), //Not related to the problem
            'logoutRedirect' => array('controller' => 'usuarios', 'action' => 'add') //Not related to the problem
        )
    );

    public function isAuthorized($user) {
        debug('opa');
    // Admin can access every action
    if (isset($usuario['papel']) && $usuario['papel'] === 'admin') {
        return true;
    }

    // Default deny
    return true;
}
    public function beforeFilter() { 
        //$this->loadModel('Usuario');
		$this->Auth->userModel = 'Usuario';
		$this->Auth->loginAction = array('admin' => false, 'controller' => 'usuarios', 'action' => 'login');
        $this->Auth->allow('index', 'view');
	}
} 
    

