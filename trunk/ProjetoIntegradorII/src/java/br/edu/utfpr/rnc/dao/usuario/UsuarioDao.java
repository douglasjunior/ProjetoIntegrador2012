package br.edu.utfpr.rnc.dao.usuario;

import br.edu.utfpr.rnc.dao.DaoAbstrato;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import javax.annotation.security.PermitAll;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;

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

    @PermitAll
    public Usuario buscarLogin(String login) {
        Query q = getEntityManager().createQuery("SELECT u FROM Usuario u WHERE u.login = :login").setParameter("login", login);
        Usuario u = null;
        try {
            u = (Usuario) q.getSingleResult();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return u;
    }
}
