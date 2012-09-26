package br.edu.utfpr.rnc.dao.rnc;

import br.edu.utfpr.rnc.dao.DaoAbstrato;
import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;


@Stateless
public class RncDao extends DaoAbstrato<Rnc> {

    @PersistenceContext(unitName = "ProjetoIntegradorIIPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public RncDao() {
        super(Rnc.class);
    }
}
