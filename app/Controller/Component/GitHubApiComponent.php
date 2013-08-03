<?php
/**
 * Created by Webonise Lab.
 * User: Hrishikesh <hrishikesh@weboniselab.com>
 * Date: 3/8/13 3:59 PM
 */
App::import('Vendor', 'github_api/vendor/autoload');
class GitHubApiComponent extends Component{

    /**
     * @var Controller
     */
    protected  $_Controller;

    /**
     * @comment Catch the controller object in protected variable
     * @param Controller $controller
     */
    public function initialize(Controller $controller) {
        $this->_Controller = $controller;
    }

    public function getGitHubClient(){

        /**
         * @var Github\Client
         */
        $client = new Github\Client();
        //$repositories = $client->api('user')->repositories('ornicar');

        return $client;

    }
}
