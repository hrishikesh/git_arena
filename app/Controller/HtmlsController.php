<?php
/**
 * Created by Webonise Lab.
 * User: Hrishikesh <hrishikesh@weboniselab.com>
 * Date: 3/8/13 10:48 AM
 */
App::uses('AppController', 'Controller');

class HtmlsController extends AppController {

    public function beforeRender() {
        parent::beforeRender();
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login_html','dashboard');
        if($this->params['action'] == 'login_html'){
            $this->layout = 'login';
        }
            $this->layout = 'home';
    }

    public function login_html(){

    }
    public function dashboard(){
    }
}
