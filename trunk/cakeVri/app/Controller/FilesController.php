<?php

App::uses('AppController', 'Controller');

CakePlugin::load('Uploader');
App::import('Vendor', 'Uploader.Uploader');

/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class FilesController extends AppController {

    public function upload() {
        if (!empty($this->data)) {
            
            echo $this->request->data['File']['fileName']['name'];
            echo $this->request->data['File']['fileName']['type'];
            echo $this->request->data['File']['fileName']['tmp_name'];
            echo $this->request->data['File']['fileName']['errors'];
            
            
            $this->Uploader = new Uploader(array('anexos' => TMP));
            if ($data = $this->Uploader->upload('fileName')) {
                echo 'sucesso';
                // Upload successful, do whatever
            }
            debug($data);
        }
    }

}
