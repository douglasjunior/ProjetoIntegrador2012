/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package clientedesktoprnc;

import br.edu.utfpr.rnc.webservice.ListarRncs_Service;

/**
 *
 * @author Douglas
 */
public class ClienteDesktopRNC {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        ListarRncs_Service service = new ListarRncs_Service();

        System.err.println("Listando: " + service.getListarRncsPort().listarRncs(""));

        // TODO code application logic here
    }
}
