/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import br.edu.utfpr.rnc.webservice.ListarRNC_Service;
import br.edu.utfpr.rnc.webservice.RncService;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;

/**
 *
 * @author Douglas
 */
@ManagedBean
@RequestScoped
public class RncBean {

    /**
     * Creates a new instance of RncBean
     */
    public RncBean() {
    }

    public List<RncService> getRncs() {

        ListarRNC_Service service = new ListarRNC_Service();

        List<RncService> rncs = service.getListarRNCPort().listarRncs("");

        System.err.println("Listando: " + rncs);

        return rncs;
    }
}
