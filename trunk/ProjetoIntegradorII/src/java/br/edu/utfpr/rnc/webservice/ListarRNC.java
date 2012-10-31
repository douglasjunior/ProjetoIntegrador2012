/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.utfpr.rnc.webservice;

import br.edu.utfpr.rnc.dao.rnc.RncDao;
import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import java.util.ArrayList;
import java.util.List;
import javax.ejb.EJB;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;

/**
 *
 * @author Douglas
 */
@WebService(serviceName = "ListarRNC")
public class ListarRNC {

    @EJB
    private RncDao rncDao;

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "listarRncs")
    public List<RNCService> listarRncs(@WebParam(name = "situacao") String situacao) {
        List<Rnc> rncs;

        if (situacao.equalsIgnoreCase("finalizado")) {
            System.out.println("webservice: busca finalizado");
            rncs = rncDao.executeNamedQuery("RNC.buscaFinalizado");
        } else if (situacao.equalsIgnoreCase("pendente")) {
            System.out.println("webservice: busca pendente");
            rncs = rncDao.executeNamedQuery("RNC.buscaPendente");
        } else if (situacao.equalsIgnoreCase("aprovado")) {
            System.out.println("webservice: busca aprovado");
            rncs = rncDao.executeNamedQuery("RNC.buscaAprovado");
        } else {
            System.out.println("webservice: busca todos");
            rncs = rncDao.executeNamedQuery("RNC.buscaTodos");
        }

        return converteObjetos(rncs);
    }

    private List<RNCService> converteObjetos(List<Rnc> rncs) {
        List<RNCService> rncsServices = new ArrayList<RNCService>();

        for (Rnc rnc : rncs) {
            rncsServices.add(new RNCService(rnc));
        }

        return rncsServices;
    }
}
