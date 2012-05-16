<?php

App::uses('AppController', 'Controller');
App::uses('RrcsController', 'Controller');

/**
 * Rncs Controller
 *
 * @property Rnc $Rnc
 */
class RncsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Rnc->recursive = 0;
        $this->set('rncs', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Rnc->id = $id;
        if (!$this->Rnc->exists()) {
            throw new NotFoundException(__('Invalid rnc'));
        }
        $this->set('rnc', $this->Rnc->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Rnc->create();
            if ($this->Rnc->save($this->request->data)) {
                $this->Session->setFlash(__('The rnc has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rnc could not be saved. Please, try again.'));
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
        $this->Rnc->id = $id;
        if (!$this->Rnc->exists()) {
            throw new NotFoundException(__('Invalid rnc'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Rnc->save($this->request->data)) {
                $this->Session->setFlash(__('The rnc has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rnc could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Rnc->read(null, $id);
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
        $this->Rnc->id = $id;
        if (!$this->Rnc->exists()) {
            throw new NotFoundException(__('Invalid rnc'));
        }
        if ($this->Rnc->delete()) {
            $this->Session->setFlash(__('Rnc deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Rnc was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function aprovar($id = null) {
        $rrcController = new RrcsController();
        $rrcAAprovar = $rrcController->getRccByID($id);

        debug($rrcAAprovar);

        echo $rrcAAprovar['Rrc']['produto'];

        $this->Rnc->produto = $rrcAAprovar['Rrc']['produto'];

        $result = $this->Rnc->save();
        
        debug($result);
        
        if ($result) {
            $this->Session->setFlash(__('The rnc has been saved'));
         //   $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The rnc could not be saved. Please, try again.'));
         //   $this->redirect(array('controller' => 'rrcs', 'action' => 'index'));
        }
    }

}
