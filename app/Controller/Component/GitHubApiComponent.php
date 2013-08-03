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


    protected $_clientId = '41304bf57f2fce832703b33502b895f658af7031';

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
        //$client->authenticate($this->_Controller->Session->read('git_hub_access.access_token'),'41304bf57f2fce832703b33502b895f658af7031');
        $this->_gitHubClient =  new Github\Client();
        $this->_gitHubClient->authenticate($this->_Controller->Session->read('git_hub_access.access_token'),$this->_clientId, 'url_token');
        //return $client;
    }

    public function getUserInfo() {
        return $this->_gitHubClient->api('current_user')->show();
    }

    public function getRepoList() {
        return $this->_gitHubClient->api('current_user')->repositories();
    }


    public function getRepoContributors($userName, $repoName, $includeNonGitHubUsers = false) {
        return $this->_gitHubClient->api('repo')->contributors($userName, $repoName, $includeNonGitHubUsers);
    }


    public function getCommitsForRepo($userName, $repoName, $branch = 'master') {
        return $this->_gitHubClient->api('repo')->commits()->all($userName, $repoName, array('sha' =>$branch));
    }



    public function getCommitsForAllRepos($userName) {
        $repoList = $this->getRepoList();
        $commits = array();
        foreach($repoList as $repo) {
            $repoCommits = $this->getCommitsForRepo($userName, $repo['name']);
            foreach($repoCommits as $repoCommit) {
                $commits[] = $repoCommit;
            }
        }
        return $commits;
    }



}
