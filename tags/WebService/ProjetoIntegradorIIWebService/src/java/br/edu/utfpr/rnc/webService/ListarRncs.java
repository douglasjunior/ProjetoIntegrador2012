/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.utfpr.rnc.webService;

import br.edu.utfpr.rnc.dao.rnc.RncDao;
import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import java.util.List;
import javax.ejb.EJB;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;

/**
 *
 * @author Douglas
 */
@WebService(serviceName = "ListarRncs")
public class ListarRncs {

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
    public List<Rnc> listarRncs(@WebParam(name = "situacao") String situacao) {
        List<Rnc> rncs = rncDao.buscarTodos();
        System.out.println("chamou caraio");
        return rncs;
    }
}
