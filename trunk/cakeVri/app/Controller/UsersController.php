<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 * senha: '45658aed9ab330c83af707aaacea541365adbbe2'
 * @property User $User
 */
class UsersController extends AppController {

    public function isAuthorized($user) {
        if (parent::isAuthorized($user) == FALSE) {
            if (in_array($this->action, array('login', 'logout'))) {
                return true;
            }
            if (in_array($this->action, array('view', 'edit', 'alterarSenha'))) {
                if ($user['id'] == $this->request->params['pass']['0']) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }

    public function login() {
        if ($this->Auth->user() != NULL) {
            return $this->redirect(array('controller' => 'rrcs', 'action' => 'index', 'minhas'));
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'rrcs', 'action' => 'index', 'minhas'));
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
                // $this->request->data['User']['password'] = $this->Auth->password($senha); // como criptografar senha
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
                $this->set('user', $userSelecionado);
            }
        }
    }

    /**
     * meotodo para alterar senha
     *
     * @param string $id
     * @return void
     */
    public function alterarSenha($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido.'));
        }
        $userSelecionado = $this->User->read(null, $id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $senhaAtual = $this->request->data['User']['current_password'];
            $novaSenha = $this->request->data['User']['new_password'];
            $confirmaSenha = $this->request->data['User']['confirm_password'];
            if ($this->Auth->password($senhaAtual) != $userSelecionado['User']['password']) {
                $this->Session->setFlash(__('Senha atual não confere.'));
                return;
            }
            if ($novaSenha != $confirmaSenha) {
                $this->Session->setFlash(__('Novas senhas não conferem.'));
                return;
            }
            $userSelecionado['User']['password'] = $novaSenha;
            if ($this->User->save($userSelecionado)) {
                $this->Session->setFlash(__('Senha alterada com sucesso!'));
                $this->redirect(array('action' => 'edit', $userSelecionado['User']['id']));
            } else {
                $this->Session->setFlash(__('Ocorreu um erro ao alterar a senha do Usuário. Tente novamente.'));
            }
        } else {
            $this->request->data = $userSelecionado;
            $this->set('user', $userSelecionado);
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

    public function getAuthUser() {
        return $this->Auth;
    }

}
