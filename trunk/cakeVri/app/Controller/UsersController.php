<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 * senha: '45658aed9ab330c83af707aaacea541365adbbe2'
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'rrcs', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário ou senha Inválidos, tente novamente.'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $senha = $this->request->data['User']['password'];
            $senha2 = $this->request->data['User']['confirm_password'];
            if ($senha != $senha2) {
                $this->Session->setFlash(__('Senhas não conferem.'));
            } else {
                // $this->request->data['User']['password'] = $this->Auth->password($senha);
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Usuário cadastrado com sucesso!'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Ocorreu um erro ao salvar este Usuário. Tente novamente.'));
                }
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário salvo com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Ocorreu um erro ao salvar este Usuário. Tente novamente.'));
            }
        } else {
            $userSelecionado = $this->User->read(null, $id);
            if ($userSelecionado['User']['username'] == 'admin') {
                $this->Session->setFlash(__('Usuário ' . $userSelecionado['User']['nome'] . ' não pode ser editado.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->request->data = $userSelecionado;
            }
        }
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        $userSelecionado = $this->User->read(null, $id);
        if ($userSelecionado['User']['username'] == 'admin') {
            $this->Session->setFlash(__('Usuário ' . $userSelecionado['User']['nome'] . ' não pode ser excluído.'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário excluído do sistema com sucesso!'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não pode ser excluído.'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function getAuthUser(){
        return $this->Auth;
    }

}
