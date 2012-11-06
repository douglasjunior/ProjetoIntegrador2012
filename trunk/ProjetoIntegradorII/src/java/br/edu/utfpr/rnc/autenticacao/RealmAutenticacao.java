/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.utfpr.rnc.autenticacao;

import javax.naming.InitialContext;
import javax.sql.DataSource;
import org.apache.shiro.realm.jdbc.JdbcRealm;

/**
 *
 * @author Usuario
 */
public class RealmAutenticacao extends JdbcRealm {

    private final String AUTENTICATION_QUERY = "SELECT senha FROM USUARIO WHERE login = ?";
    private final String USER_NAME_QUERY = "SELECT nome FROM USUARIO WHERE login = ?";
    /**
     * The default query used to retrieve the roles that apply to a user.
     */
    protected static final String USER_ROLES_QUERY = "SELECT nome FROM PAPEL WHERE id in("
            + "SELECT papel_id FROM USUARIO WHERE login = ?)";

    public RealmAutenticacao() {
        super();

        authenticationQuery = AUTENTICATION_QUERY;
        userRolesQuery = USER_ROLES_QUERY;

        InitialContext ic;
        DataSource ds;

        try {
            ic = new InitialContext();
            ds = (DataSource) ic.lookup("aluno"); // jndi-name do arquivo glassfish-resources.xml
            this.setDataSource(ds);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
