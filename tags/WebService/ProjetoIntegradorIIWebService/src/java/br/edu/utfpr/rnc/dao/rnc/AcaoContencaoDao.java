package br.edu.utfpr.rnc.dao.rnc;

import br.edu.utfpr.rnc.dao.DaoAbstrato;
import br.edu.utfpr.rnc.pojo.rnc.AcaoContencao;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

@Stateless
public class AcaoContencaoDao extends DaoAbstrato<AcaoContencao> {

    @PersistenceContext(unitName = "ProjetoIntegradorIIPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public AcaoContencaoDao() {
        super(AcaoContencao.class);
    }
}
