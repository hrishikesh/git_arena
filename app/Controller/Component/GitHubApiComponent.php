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
     * @var Github\Client
     */
    protected $_gitHubClient;

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
        $client = new Github\Client(
            //new Github\HttpClient\CachedHttpClient(array('cache_dir' => '/tmp/github-api-cache'))
        );
        $client->authenticate('dc513ade28e3fc36d43a','25d5fedbae2b95c5502f714aeaad12a9e9420615', Github\Client::AUTH_URL_CLIENT_ID);
        $this->_gitHubClient =  new Github\Client();
        return $client;
    }

    public function getUserInfo() {
        return $this->_gitHubClient->api('user')->show('me');
    }

    public function getRepoList($user = 'me') {
        return $this->_gitHubClient->api('user')->repositories($user);
    }


    public function getRepoContributors($org, $repoName, $includeNonGitHubUsers = false) {
        return $this->_gitHubClient->api('repo')->contributors($org, $repoName, $includeNonGitHubUsers);
    }



}
