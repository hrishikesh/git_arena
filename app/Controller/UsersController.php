<?php
/**
 * Created by Webonise Lab.
 * User: Hrishikesh <hrishikesh@weboniselab.com>
 * Date: 3/8/13 3:25 PM
 */

/**
 * @property GitHubApiComponent $GitHubApi
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
        echo 'here';die;
    }

    public function login() {
        if (($this->request->is('get') && !empty($this->request->data))) {
            pr($this->request->data);
            die;
        }

        $this->set(compact('CLIENT_ID', 'REDIRECT_URL'));


    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());

    }

    public function dashboard() {
        $this->autoRender=false;
        $url = 'https://github.com/login/oauth/access_token?';
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
        $accessToken = curl_exec($curl_handle);
        $gitHubAccessInfoRaw = explode('&',$accessToken);
        $gitHubAccessInfo = array();
        foreach($gitHubAccessInfoRaw as $gitHubAccess) {
            $accessTokenSlices = explode('=', $gitHubAccess);
            $gitHubAccessInfo[$accessTokenSlices[0]] = $accessTokenSlices[1];
        }
        curl_close($curl_handle);
        $this->Session->write('git_hub_access',$gitHubAccessInfo);

        $this->GitHubApi->getGitHubClient();
        $user = $this->GitHubApi->getUserInfo();

        pr($user);die;
    }
}