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
        $this->Auth->allow('login_html', 'dashboard');
        if ($this->params['action'] == 'login_html') {
            $this->layout = 'login';
        }
        $this->layout = 'home';
    }

    public function login_html() {

        $commits = $this->GitHubApi
            ->getGitHubClient()
            ->api('repo')
            ->commits()
            ->all('hrishikesh',
            'git_arena',
            array(
                 'sha' => array(
                     'master',
                     'develop'
                 )
            ));

        pr($commits);
        exit;
        //
        //         $commits = $this->GitHubApi->commitsInfo();

        //        $this->getCommitsInfo($commits);

        $repos = $this->GitHubApi
            ->getGitHubClient()
            ->api('repo')
            ->find('webonise', array('language' => ''));
        pr($repos);
        exit;

    }

    public function getCommitsInfo($commits) {

        //        pr($commits);

        foreach ($commits as $key => $commit) {
            $commitsInfo[$key] = array(
                'id'          => $commit['committer']['id'],
                'name'        => $commit['commit']['committer']['name'],
                'message'     => $commit['commit']['message'],
                'email'       => $commit['commit']['committer']['email'],
                'date'        => $commit['commit']['committer']['date'],
                'avatar_url'  => $commit['committer']['avatar_url'],
                'gravatar_id' => $commit['committer']['gravatar_id'],

            );
        }


        pr($commitsInfo);
        exit;

    }

    public function dashboard() {
    }
}
