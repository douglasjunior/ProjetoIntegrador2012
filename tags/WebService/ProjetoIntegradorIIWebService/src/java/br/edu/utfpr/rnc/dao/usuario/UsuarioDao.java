package br.edu.utfpr.rnc.dao.usuario;

import br.edu.utfpr.rnc.dao.DaoAbstrato;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

@Stateless
public class UsuarioDao extends DaoAbstrato<Usuario> {

    @PersistenceContext(unitName = "ProjetoIntegradorIIPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public UsuarioDao() {
        super(Usuario.class);
    }
}
