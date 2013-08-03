<?php
/**
 * Created by Webonise Lab.
 * User: Hrishikesh <hrishikesh@weboniselab.com>
 * Date: 3/8/13 4:33 PM
 */
App::uses('AppController', 'Controller');
/**
 * @property GitHubApiComponent $GitHubApi
 */
class TestsController extends AppController {

    /**
     * @var array
     */
    public $components = array('GitHubApi');

    public function beforeRender() {
        parent::beforeRender();
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
        $this->layout = 'login';
    }

    public function index(){
        $gitHubClient =$this->GitHubApi->getGitHubClient();
        pr($gitHubClient);
    }
}
