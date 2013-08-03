<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth',
        'GitHubApi'
    );
    public $CLIENT_ID;
    public $CLIENT_SECRET;
    public $URL;

    public function beforeRender() {
        parent::beforeRender();
    }

    public function beforeFilter() {
        parent::beforeFilter();

        $this->layout = 'home';

        $this->Auth->authenticate   = array(
            AuthComponent::ALL => array(),
            'Form'
        );
        $this->Auth->loginAction    = array(
            'controller' => 'users',
            'action'     => 'login'
        );
        $this->Auth->loginRedirect  = array(
            'controller' => 'users',
            'action'     => 'callback'
        );
        $this->Auth->logoutRedirect = array(
            'controller' => 'users',
            'action'     => 'login'
        );
        $this->Auth->authError      = 'Invalid username or password.';
        $this->Auth->autoRedirect   = false;
        $CLIENT_ID=$this->CLIENT_ID='340ed09a646a037c6b55';//dc513ade28e3fc36d43a-HR
        $CLIENT_SECRET=$this->CLIENT_SECRET='41304bf57f2fce832703b33502b895f658af7031';//25d5fedbae2b95c5502f714aeaad12a9e9420615-HR
        $REDIRECT_URL=$this->REDIRECT_URL='https://github.com/login/oauth/authorize?client_id=';
        $URL=$this->URL='https://github.com/';
        $this->set(compact('CLIENT_ID','CLIENT_SECRET','REDIRECT_URL','URL'));
    }
}
