<?php
/**
 * Created by Webonise Lab.
 * User: Hrishikesh <hrishikesh@weboniselab.com>
 * Date: 3/8/13 3:25 PM
 */

/**
 * @property GitHubApiComponent $GitHubApi
 * @property User               $User
 */
class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow(array(
                                'callback',
                                'dashboard'
                           ));
    }

    public function callback() {
        echo 'here';
        die;
    }

    public function login() {
        $this->layout = 'login';
        if (($this->request->is('get') && !empty($this->request->data))) {
            /* pr($this->request->data);
             die;*/
        }

        $this->set(compact('CLIENT_ID', 'REDIRECT_URL'));


    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());

    }

    public function dashboard() {
        $this->autoRender = false;
        $url              = 'https://github.com/login/oauth/access_token?';
        //Temporary code
        $code = isset($this->request->query['code']) ? $this->request->query['code'] : '';

        /**
         * @scenario
         * @parameters
         * =>Client Id
         * =>client secret
         * =>temporary code
         */
        $urlToGetAccessToken = $url . "client_id=" . $this->CLIENT_ID . "&client_secret=" . $this->CLIENT_SECRET . "&code=" . $code . "";

        $curl_handle = curl_init(); // create a new cURL resource
        // set URL and other appropriate options
        curl_setopt($curl_handle, CURLOPT_URL, $urlToGetAccessToken);
        curl_setopt($curl_handle, CURLOPT_HEADER, 0);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

        // grab URL and pass it to the browser
        $accessToken         = curl_exec($curl_handle);
        $gitHubAccessInfoRaw = explode('&', $accessToken);
        $gitHubAccessInfo    = array();
        foreach ($gitHubAccessInfoRaw as $gitHubAccess) {
            $accessTokenSlices                       = explode('=', $gitHubAccess);
            $gitHubAccessInfo[$accessTokenSlices[0]] = $accessTokenSlices[1];
        }
        curl_close($curl_handle);
        $this->Session->write('git_hub_access', $gitHubAccessInfo);

        $this->GitHubApi->getGitHubClient();
        $user = $this->GitHubApi->getUserInfo();
        //Save users data
        if ($this->User->checkAlreadyExists($user['id']) == 0) {
            $userData = array(
                'name'       => $user['login'],
                'git_hub_id' => $user['id']
            );
            $this->User->create();
            $this->User->save($userData);
            $userInfo=$this->User->getUserData($this->User->getLastInsertID());
            $this->Session->setFlash('User data saved successfully');
        } else {
            $userInfo = $this->User->findByGitHubId($user['id']);
        }
        if($this->Auth->login($userInfo['User'])) {
            $this->redirect(array('controller'=>'users', 'action'=>'home'));
        };
    }

    public function home(){
        $repos['repositories'] = Array(
            '0' => Array(
                'type'        => 'repo',
                'username'    => 'starfishmod',
                'name'        => 'jquery-oembed-all',
                'owner'       => 'starfishmod',
                'homepage'    => 'http://starfishmod.github.com/jquery-oembed-all',
                'description' => 'A fork with improvements of the jquery-oembed project',
                'url'         => 'https://github.com/starfishmod/jquery-oembed-all',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            ),

            '1' => Array(
                'type'        => 'repo',
                'username'    => 'subtlepatterns',
                'name'        => 'SubtlePatterns',
                'owner'       => 'subtlepatterns',
                'description' => 'All the patterns',
                'url'         => 'https://github.com/subtlepatterns/SubtlePatterns',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            ),

            '2' => Array(
                'type'        => 'repo',
                'username'    => 'appcelerator',
                'name'        => 'alloy',
                'owner'       => 'appcelerator',
                'description' => 'Alloy is an MVC framework for Titanium which is developed by Appcelerator.',
                'language'    => 'JavaScript',
                'url'         => 'https://github.com/appcelerator/alloy',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            ),

            '3' => Array(
                'type'        => 'repo',
                'username'    => 'alienhard',
                'name'        => 'SublimeAllAutocomplete',
                'owner'       => 'alienhard',
                'description' => 'Extend Sublime Text 2 autocompletion to find matches in all open files of the current window',
                'language'    => 'Python',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            ),

            '4' => Array(
                'type'        => 'repo',
                'username'    => 'Polymer',
                'name'        => 'polymer-all',
                'owner'       => 'Polymer',
                'description' => 'Combination of polymer, elements, and projects repositories for easy cloning.',
                'url'         => 'https://github.com/appcelerator/alloy',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            ),

            '5' => Array(
                'type'        => 'repo',
                'username'    => 'omgmog',
                'name'        => 'install-all-firefox',
                'owner'       => 'omgmog',
                'description' => 'bash script to install major Firefox versions on Mac OS X',
                'language'    => 'Shell',
                'url'         => 'https://github.com/appcelerator/alloy',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            ),

            '6' => Array(
                'type'        => 'repo',
                'username'    => 'meitar',
                'name'        => 'git-archive-all.sh',
                'owner'       => 'meitar',
                'description' => 'A bash shell script wrapper for git-archive that archives a git superproject and its submodules, if it has any.',
                'language'    => 'Shell',
                'url'         => 'https://github.com/appcelerator/alloy',
                'created'     => '2011-07-10T02:52:49Z',
                'created_at'  => '2011-07-10T02:52:49Z',
                'pushed_at'   => '2013-05-28T06:38:06Z',
                'pushed'      => '2013-05-28T06:38:06Z'
            )
        );

        $commits = Array(
            '0' => Array(
                'sha'       => '8da38b6f198804e3e82c513e2f3d5657ea59adb6',
                'commit'    => Array(
                    'author'    => Array(
                        'name'  => 'hrishikesh',
                        'email' => 'hrishikesh@weboniselab.com',
                        'date'  => '2013-08-03T10:50:27Z'
                    ),

                    'committer' => Array(
                        'name'  => 'hrishikesh',
                        'email' => 'hrishikesh@weboniselab.com',
                        'date'  => '2013-08-03T10:50:27Z',
                    ),

                    'message'   => 'Deleted cache files',
                ),
                'committer' => Array(
                    'login'       => 'hrishikesh',
                    'id'          => '3132211',
                    'avatar_url'  => 'https://secure.gravatar.com/avatar/b83c548a8feab3dabe0db5ff1aa9db01?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png',
                    'gravatar_id' => 'b83c548a8feab3dabe0db5ff1aa9db01',
                    'url'         => 'https://api.github.com/users/hrishikesh'
                ),
            ),

            '1' => Array(
                'sha'       => '8b667adabcd6a6a2ba244701557562cb66c0d89e',
                'commit'    => Array(
                    'author'    => Array(
                        'name'  => 'hrishikesh',
                        'email' => 'hrishikesh@weboniselab.com',
                        'date'  => '2013-08-03T10:49:23Z',
                    ),

                    'committer' => Array(
                        'name'  => 'hrishikesh',
                        'email' => 'hrishikesh@weboniselab.com',
                        'date'  => '2013-08-03T10:49:23Z',
                    ),

                    'message'   => 'Deleted cache files',
                ),
                'committer' => Array(
                    'login'       => 'hrishikesh',
                    'id'          => '3132211',
                    'avatar_url'  => 'https://secure.gravatar.com/avatar/b83c548a8feab3dabe0db5ff1aa9db01?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png',
                    'gravatar_id' => 'b83c548a8feab3dabe0db5ff1aa9db01',
                    'url'         => 'https://api.github.com/users/hrishikesh',
                ),
            ),

            '2' => Array(
                'sha'       => '8a8a6e745634fc72536fc345573963d80606affb',
                'commit'    => Array(
                    'author'    => Array(
                        'name'  => 'hrishikesh',
                        'email' => 'hrishikesh@weboniselab.com',
                        'date'  => '2013-08-03T10:48:55Z',
                    ),

                    'committer' => Array(
                        'name'  => 'hrishikesh',
                        'email' => 'hrishikesh@weboniselab.com',
                        'date'  => '2013-08-03T10:48:55Z',
                    ),

                    'message'   => 'Merge branch  of github.com:hrishikesh/git_arena',
                ),
                'committer' => Array(
                    'login'       => 'hrishikesh',
                    'id'          => '3132211',
                    'avatar_url'  => 'https://secure.gravatar.com/avatar/b83c548a8feab3dabe0db5ff1aa9db01?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png',
                    'gravatar_id' => 'b83c548a8feab3dabe0db5ff1aa9db01',
                    'url'         => 'https://api.github.com/users/hrishikesh',
                ),

            )

        );
        $this->set(compact('repos', 'commits'));
    }
}