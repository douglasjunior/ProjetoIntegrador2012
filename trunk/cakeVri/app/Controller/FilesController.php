<?php

App::uses('AppController', 'Controller');

/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class FilesController extends AppController {

    public function upload() {
        if (!empty($this->data)) {

            $fileTmp = $this->request->data['File']['fileName']['tmp_name'];
            $fileName = $this->request->data['File']['fileName']['name'];
            $diretorioDestino = "anexos/" . $fileName;

            echo $this->request->data['File']['fileName']['name'] . '<br />';
            echo $this->request->data['File']['fileName']['tmp_name'] . '<br />';
            echo $diretorioDestino . '<br />';
            
            if ($data = move_uploaded_file($fileTmp, $diretorioDestino)) {
                echo 'Sucesso' . '<br />';
                echo '<a href=\'../' . $diretorioDestino . '\'>Link para anexo.</a>';
            } else {
                echo 'Falha' . '<br />';
            }

            debug($data);
        }
    }

}
