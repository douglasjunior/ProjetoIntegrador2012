<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 * senha: '45658aed9ab330c83af707aaacea541365adbbe2'
 * @property User $User
 */
class CakevriController extends AppController {

    public function isAuthorized($user) {
        return true;
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
  
    public function index() {
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
}
