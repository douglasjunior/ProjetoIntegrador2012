package br.edu.utfpr.rnc.dao.usuario;

import br.edu.utfpr.rnc.dao.DaoAbstrato;
import br.edu.utfpr.rnc.pojo.usuario.Papel;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import javax.annotation.security.PermitAll;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;

@Stateless
public class PapelDao extends DaoAbstrato<Papel> {

    @PersistenceContext(unitName = "ProjetoIntegradorIIPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public PapelDao() {
        super(Papel.class);
    }

}
