/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import br.edu.utfpr.rnc.webservice.ListarRNC_Service;
import br.edu.utfpr.rnc.webservice.RncService;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

/**
 *
 * @author Douglas
 */
@ManagedBean
@SessionScoped
public class RncBean {

    private List<RncService> rncs;
    private String situacao;

    /**
     * Creates a new instance of RncBean
     */
    public RncBean() {
    }

    public List<RncService> getRncs() {
        return rncs;
    }

    public void buscar() {
        if (situacao == null || situacao.isEmpty()) {
            rncs = new ArrayList<RncService>();
            return;
        }
        ListarRNC_Service service = new ListarRNC_Service();
        rncs = service.getListarRNCPort().listarRncs(situacao);
    }

    public String getSituacao() {
        return situacao;
    }

    public void setSituacao(String situacao) {
        this.situacao = situacao;
    }
}
