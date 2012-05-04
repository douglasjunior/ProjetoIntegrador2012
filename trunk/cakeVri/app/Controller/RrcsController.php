<?php

App::uses('AppController', 'Controller');

CakePlugin::load('Uploader');
App::import('Vendor', 'Uploader.Uploader');

/**
 * Rrcs Controller
 *
 * @property Rrc $Rrc
 */
class RrcsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Rrc->recursive = 0;
        $this->set('rrcs', $this->paginate());
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
            $this->Uploader = new Uploader(array('anexos' => TMP));
            if ($anexo = $this->Uploader->upload($this->request->data['Rrc']['anexo'])) {
                echo 'Upload com sucesso!';
            } else {
                echo 'Upload com erro!';
            }


            if ($this->Rrc->save($this->request->data)) {
                $this->Session->setFlash(__('The rrc has been saved'));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rrc could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Rrc->Usuario->find('list');
        $this->set(compact('usuarios'));
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
        $usuarios = $this->Rrc->Usuario->find('list');
        $this->set(compact('usuarios'));
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
        if ($this->Rrc->delete()) {
            $this->Session->setFlash(__('Rrc deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Rrc was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
