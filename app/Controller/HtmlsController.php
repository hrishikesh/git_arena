<?php
/**
 * Created by Webonise Lab.
 * User: Hrishikesh <hrishikesh@weboniselab.com>
 * Date: 3/8/13 10:48 AM
 */
class HtmlsController extends AppController{

    public function beforeRender() {
        parent::beforeRender();
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    public function login(){
        
    }
}
