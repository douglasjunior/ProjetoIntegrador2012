package br.edu.utfpr.rnc.managedbean.usuario;

import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.managedbean.GerenciadorPaginas;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import br.edu.utfpr.rnc.util.JsfUtil;
import br.edu.utfpr.rnc.util.PasswordHash;
import java.util.Arrays;
import java.util.List;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;
import javax.servlet.http.HttpSession;
import org.apache.shiro.SecurityUtils;
import org.apache.shiro.authc.UsernamePasswordToken;
import org.apache.shiro.subject.Subject;

@ManagedBean(name = "usuarioBean")
@RequestScoped
public class UsuarioBean {

    @EJB
    private UsuarioDao usuarioDao;
    private Usuario usuario;
    private String confirmaSenha;

    public String getConfirmaSenha() {
        return confirmaSenha;
    }

    public void setConfirmaSenha(String confirmaSenha) {
        this.confirmaSenha = confirmaSenha;
    }

    public UsuarioDao getUsuarioDao() {
        return usuarioDao;
    }

    public void setUsuarioDao(UsuarioDao usuarioDao) {
        this.usuarioDao = usuarioDao;
    }

    public UsuarioBean() {
        usuario = new Usuario();
    }

    @FacesConverter(forClass = Usuario.class)
    public static class UsuarioConverter implements Converter {

        @Override
        public Object getAsObject(FacesContext facesContext, UIComponent component, String value) {
            if (value == null || value.length() == 0 || value.equals("null")) {
                return null;
            }
            UsuarioBean bean = (UsuarioBean) facesContext.getApplication().getELResolver().
                    getValue(facesContext.getELContext(), null, "usuarioBean");
            return bean.usuarioDao.buscar(getKey(value));
        }

        java.lang.Integer getKey(String value) {
            java.lang.Integer key;
            key = Integer.valueOf(value);
            return key;
        }

        String getStringKey(java.lang.Integer value) {
            StringBuilder sb = new StringBuilder();
            sb.append(value);
            return sb.toString();
        }

        @Override
        public String getAsString(FacesContext facesContext, UIComponent component, Object object) {
            if (object == null) {
                return null;
            }
            if (object instanceof Usuario) {
                Usuario o = (Usuario) object;
                return getStringKey(o.getId());
            } else {
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + Usuario.class.getName());
            }
        }
    }

    public UsuarioConverter getConverter() {
        return new UsuarioConverter();
    }

    public Usuario getUsuario() {
        return usuario;
    }

    public void setUsuario(Usuario usuario) {
        this.usuario = usuario;
    }

    public void salvar() {
        if (!this.usuario.getSenha().equals(this.confirmaSenha)) {
            JsfUtil.addErrorMessage("", "As senhas digitadas não conferem!");
        } else {
            confirmaSenha = null;

            try {
                if (usuario.getId() == 0) {
                    if (!usuario.getSenha().isEmpty()) {
                        usuario.setSenha(new PasswordHash().hash512(usuario.getSenha()));
                        usuarioDao.criarEntidade(usuario);
                        usuario = new Usuario();
                        JsfUtil.addSuccessMessage("", "Usuário salvo com sucesso.");
                    } else {
                        JsfUtil.addErrorMessage("Erro ao salvar usuário", "Deve ser informada uma senha.");
                    }
                } else {
                    if (usuario.getSenha().isEmpty()) {
                        Usuario u = usuarioDao.buscar(usuario.getId());
                        usuario.setSenha(u.getSenha());
                    } else {
                        usuario.setSenha(new PasswordHash().hash512(usuario.getSenha()));
                    }
                    usuarioDao.editar(usuario);
                    ((GerenciadorPaginas) JsfUtil.getObjectFromSession("gerenciadorPaginas")).consultaUsuario();
                }

            } catch (Exception e) {
                e.printStackTrace();
                JsfUtil.addErrorMessage("", "Erro ao salvar usuário.");
            }
        }
    }

    public List<Usuario> getUsuariosResponsaveis() {
        return Arrays.asList(new Usuario(), new Usuario(), new Usuario(), new Usuario());
    }

    public void editar() {
        Usuario usuario = (Usuario) JsfUtil.getObjectFromRequestParameter("usuario");
        this.usuario = usuario;
    }

    public void remover() {
        try {
            Usuario usuario = (Usuario) JsfUtil.getObjectFromSession("usuario");
            usuarioDao.remover(usuario);
        } catch (Exception e) {
            e.printStackTrace();
        }
        removerUsuarioDaSessao();
    }

    public void adicionarUsuarionaSessao() {
        Usuario usuario = (Usuario) JsfUtil.getObjectFromRequestParameter("usuario");
        HttpSession hs = JsfUtil.getSession(false);
        hs.setAttribute("usuario", usuario);
    }

    public void removerUsuarioDaSessao() {
        HttpSession hs = JsfUtil.getSession(false);
        hs.removeAttribute("usuario");
    }

    public List<Usuario> getTodosUsuarios() {
        return usuarioDao.buscarTodos();
    }

    public void limparCampos() {
        usuario = new Usuario();
    }

    public void login() {
        try {
            UsernamePasswordToken token = new UsernamePasswordToken(usuario.getLogin(), new PasswordHash().hash512(usuario.getSenha()));

            Subject subject = SecurityUtils.getSubject();

            subject.login(token);

            token.clear();

            subject.getSession().setTimeout(600000l);
            
            ((GerenciadorPaginas) JsfUtil.getObjectFromSession("gerenciadorPaginas")).home();
            JsfUtil.redirect("index.xhtml");
        } catch (Exception e) {
            JsfUtil.addErrorMessage("Usuário ou senha inválidos.", "");
        }
    }

    public void logout() {
        Subject subject = SecurityUtils.getSubject();

        if (subject != null) {
            subject.logout();
        }

        HttpSession session = JsfUtil.getSession(false);

        if (session != null) {
            session.invalidate();
        }

        JsfUtil.redirect("index.xhtml");
    }
}
