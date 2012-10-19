<?php

App::uses('AppController', 'Controller');

/**
 * Rrcs Controller
 *
 * @property Rrc $Rrc
 */
class RrcsController extends AppController {

    public function isAuthorized($user) {
        if (parent::isAuthorized($user) == FALSE) {
            if (in_array($this->action, array('add', 'index'))) {
                return true;
            }
            if (in_array($this->action, array('edit', 'delete', 'view', 'addAnexo'))) {
                $rrcId = $this->request->params['pass']['0'];
                if ($this->Rrc->ehDono($rrcId, $user['id'])) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }

    /**
     * index method
     *
     * @return void
     */
    public function index($param = NULL) {
        $this->Rrc->recursive = 0;
        if ($param == 'minhas') {
            $this->set(
                    'rrcs', $this->paginate(
                            'Rrc', array('Rrc.user_id =' => $this->Auth->User('id'))
                    )
            );
            $this->set('minhas', true);
        } else {
            if ($this->Auth->User('tipo') == 'externo') {
                return $this->redirect(array('action' => 'index', 'minhas'));
            }
            $this->set('rrcs', $this->paginate());
            $this->set('minhas', false);
        }
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Rrc->id = $id;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('Invalid rrc'));
        }
        $this->set('rrc', $this->Rrc->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            //$this->Rrc->create();
            date_default_timezone_set('Brazil/East');
            $this->request->data['Rrc']['dataCriacao'] = date('Y-m-d H:i:s');
            if ($this->Auth->User('tipo') == 'externo') {
                $this->request->data['Rrc']['user_id'] = $this->Auth->User('id');
            }
            if ($this->Rrc->save($this->request->data)) {
                $this->Session->setFlash(__('The rrc has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rrc could not be saved. Please, try again.'));
            }
        }
        $users = $this->Rrc->User->find('list', array('fields' => 'nome'));
        $this->set(compact('users'));
    }

    private function salvarAnexo($arrayAnexo, $id) {
        $fileTmp = $arrayAnexo['tmp_name'];
        $fileName = $arrayAnexo['name'];
        $diretorioDestino = "anexos/" . $id . "/";

        // cria diretorio se nao existir
        mkdir($diretorioDestino, 0777, true);

        // apaga a anexos ja existentes se existirem
        foreach ($anexos = scandir("$diretorioDestino") as $arquivoParaDeletar) {
            @unlink($diretorioDestino . $arquivoParaDeletar);
        }

        $diretorioDestino = $diretorioDestino . $fileName;

        if ($resultado = move_uploaded_file($fileTmp, $diretorioDestino)) {
            debug($resultado);
            return $diretorioDestino;
        } else {
            return "";
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Rrc->id = $id;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('Invalid rrc'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Rrc->save($this->request->data)) {
                $this->Session->setFlash(__('The rrc has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rrc could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Rrc->read(null, $id);
        }
        $users = $this->Rrc->User->find('list', array('fields' => 'nome'));
        $this->set(compact('users'));
    }

    public function addAnexo($id = null) {
        $this->Rrc->id = $id;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('Invalid rrc'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $anexoSalvo = $this->salvarAnexo($this->request->data['Rrc']['anexo'], $id);

            $this->request->data['Rrc']['anexo'] = $anexoSalvo;

            if ($this->Rrc->save($this->request->data)) {
                $this->Session->setFlash(__('The rrc has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rrc could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Rrc->read(null, $id);
        }
        $this->set(compact('users'));
        $this->set('rrc', $this->Rrc->read(null, $id));
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

        $this->Rrc->id = $id;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('Invalid rrc'));
        }

        $diretorioAnexos = "anexos/$id/";

        // deletar arquivo de anexo
        foreach ($anexos = scandir($diretorioAnexos) as $arquivoParaDeletar) {
            @unlink($diretorioAnexos . $arquivoParaDeletar);
        }

        rmdir($diretorioAnexos);

        if ($this->Rrc->delete()) {
            $this->Session->setFlash(__('Rrc deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Rrc was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function aprovar($id = null) {
        $this->Rrc->id = $id;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('RRC não encontrada.'));
        }
        $rrc = $this->Rrc->read(null, $id);
        if ($rrc['Rrc']['rnc_id'] != null) {
            throw new NotFoundException(__('Esta RRC já foi aprovada.'));
        }
        $this->redirect(array('controller' => 'rncs', 'action' => 'aprovar', $id));
    }

    public function getRccByID($id) {
        $this->Rrc->id = $id;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('RRC não encontrada.'));
        }
        return $this->Rrc->read(null, $id);
    }

    public function saveIdRnc($idRrc = NULL, $idRnc = NULL) {
        $this->Rrc->id = $idRrc;
        if (!$this->Rrc->exists()) {
            throw new NotFoundException(__('Invalid rrc'));
        }
        $this->request->data['Rrc']['rnc_id'] = $idRnc;
        $this->Rrc->save($this->request->data);
    }

}
