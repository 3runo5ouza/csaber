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

    public $components = array(
        //'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'authError' => 'Você precisa estar logado para ver isso.',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array('username' => 'nome','password' => 'senha'),
                    'passwordHasher' => array('className' => 'Simple','hashType' => 'sha256'),
                )
            ),
            'loginAction' => array('controller' => 'usuarios', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'atividades', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'usuarios', 'action' => 'login')
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
		parent::beforeFilter();
        $this->Auth->allow('index');
	}
} 
    

