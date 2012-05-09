package br.edu.utfpr.rnc.managedbean.usuario;

import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import br.edu.utfpr.rnc.util.JsfUtil;
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
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + UsuarioBean.class.getName());
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
                    usuarioDao.criarEntidade(usuario);
                    JsfUtil.addSuccessMessage("", "Usuário salvo com sucesso.");
                } else {
                    usuarioDao.editar(usuario);
                }
                usuario = new Usuario();
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
}
