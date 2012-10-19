<?php

App::uses('AppController', 'Controller');
App::uses('RrcsController', 'Controller');

/**
 * Rncs Controller
 *
 * @property Rnc $Rnc
 */
class RncsController extends AppController {

    public function isAuthorized($user) {
        if (parent::isAuthorized($user) == FALSE) {
            if (in_array($this->action, array('view'))) {
                $rncId = $this->request->params['pass']['0'];
                $rnc = $this->Rnc->read(null, $rncId);
                if ($rnc['Rrc']['0']['user_id'] == $user['id']) {
                    return true;
                }
            }
            return false;
        }
        return true;
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

    public function aprovar($id = null) {
        $rrcController = new RrcsController();
        $rrcAAprovar = $rrcController->getRccByID($id);

        if ($rrcAAprovar['Rrc']['rnc_id'] != null) {
            throw new NotFoundException(__('Esta RRC já foi aprovada.'));
        }

        $this->request->data['Rnc']['CODIGOPRODUTO'] = $rrcAAprovar['Rrc']['produto'];
        $this->request->data['Rnc']['DATARNC'] = $rrcAAprovar['Rrc']['dataCriacao'];
        $this->request->data['Rnc']['DESCRICAONC'] = $rrcAAprovar['Rrc']['descricao'];
        $this->request->data['Rnc']['DOCUMENTOORIGEM'] = $rrcAAprovar['Rrc']['documentoOrigem'];
        $this->request->data['Rnc']['NUMEROLOTE'] = $rrcAAprovar['Rrc']['numeroDeLote'];
        $this->request->data['Rnc']['ORIGEMRNC'] = "Registro de Reclamação no Site. Cod: " . $id;
        $this->request->data['Rnc']['QUANTIDADERECEBIDA'] = $rrcAAprovar['Rrc']['quantidadeRecebido'];
        $this->request->data['Rnc']['QUANTIDADEREPROVADA'] = $rrcAAprovar['Rrc']['quantidadeReprovado'];
        $this->request->data['Rnc']['RELATORIO'] = $rrcAAprovar['Rrc']['relatorio'];
        $this->request->data['Rnc']['EMPRESAEMITENTE'] = $rrcAAprovar['User']['nome'];
        $this->request->data['Rnc']['RRC'] = true;

        $result = $this->Rnc->save($this->request->data);

        if ($result) {
            $rrcController->saveIdRnc($id, $this->Rnc->getID());
            $this->enviarEmail($rrcAAprovar['User']['email'], $id);
            $this->Session->setFlash(__("A RCC cód. $id foi aprovada com sucesso e gerou a RNC cód. " . $this->Rnc->getID() . "."));
            $this->redirect(array('controller' => 'rrcs', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Ocorreu um erro ao aprovar a RRC, por favor, tente novamente.'));
        }
    }

    public function enviarEmail($emailCliente = NULL, $idRrc = NULL) {
        $mensagem =
                "Prezado cliente,<br />
                <br />       
                A RRC cód. <b>$idRrc</b> foi aprovada e está em fase de análise, para acompanhar o andamento acesse o sistema de RRCs da VRI no seguinte link www.vri.com.br/rrc .<br />
                <br />
                --<br />
                Atenciosamente<br />
                VRI Industria Eletrônica";

        $msg = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
        $msg .= "<html>";
        $msg .= "<head></head>";
        $msg .= "<body style=\"background-color:#fff;\" >";
        $msg .= $mensagem;
        $msg .= "</body>";
        $msg .= "</html>";

        $mail = new PHPMailer(); //
// Define o método de envio
        $mail->Mailer = "smtp";

// Define que a mensagem poderá ter formatação HTML
        $mail->IsHTML(true);

// Define que a codificação do conteúdo da mensagem será utf-8
        $mail->CharSet = "utf-8";

// Define que os emails enviadas utilizarão SMTP Seguro tls
//$mail->SMTPSecure = "tls";
// Define que o Host que enviará a mensagem é o Gmail
        $mail->Host = "mail.vri.com.br";

//Define a porta utilizada pelo Gmail para o envio autenticado
        $mail->Port = "25";

// Deine que a mensagem utiliza método de envio autenticado
        $mail->SMTPAuth = "true";

// Defina o email e o nome que aparecerá como remetente no cabeçalho
        $mail->From = "sistemarrc@vri.com.br";
        $mail->FromName = "VRI - Sistema de Registro de Reclamação de Clientes";

// Define o usuário do gmail autenticado responsável pelo envio
        $mail->Username = "sistemarrc@vri.com.br";

// Define a senha deste usuário citado acima
        $mail->Password = "utfprrrc";

// Define o destinatário que receberá a mensagem
        $mail->AddAddress($emailCliente);

        /*
          Define o email que receberá resposta desta
          mensagem, quando o destinatário responder
         */
        $mail->AddReplyTo($mail->From, $mail->FromName);

// Assunto da mensagem
        $mail->Subject = "Sua RRC cód. $idRrc foi aprovada";

// Toda a estrutura HTML e corpo da mensagem
        $mail->Body = $msg;

// Controle de erro ou sucesso no envio
        $mail->Send();
    }

}
