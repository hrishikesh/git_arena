<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 * * @property User $User
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    /**
     * @param null $gitHubId
     * This function is sued to shoe the user is exist or not
     */
    public function checkAlreadyExists($gitHubId = null) {
        return $this->find('count',
            array(
                 'User.git_hub_id' => $gitHubId
            ));
    }

    public function getUserData($userId = null) {
        return $this->find('first',
            array(
                 'conditions' => array('User.id' => $userId),
                 'recursive'  => -1
            ));

    }

}
