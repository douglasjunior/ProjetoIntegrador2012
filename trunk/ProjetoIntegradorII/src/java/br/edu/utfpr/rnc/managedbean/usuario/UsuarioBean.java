package br.edu.utfpr.rnc.managedbean.usuario;

import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.managedbean.GerenciadorPaginas;
import br.edu.utfpr.rnc.pojo.departamento.Departamento;
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

@ManagedBean(name = "usuarioBean")
@RequestScoped
public class UsuarioBean {

    @EJB
    private UsuarioDao usuarioDao;
    private Usuario usuario;

    public UsuarioBean() {
        usuario = new Usuario();
    }

    @FacesConverter(forClass = Departamento.class)
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

    public String salvar() {
        GerenciadorPaginas gerenciador = (GerenciadorPaginas) JsfUtil.getObjectFromSession("gerenciadorPaginas");
        System.out.println(gerenciador);
        gerenciador.setConteudo("./paginas/home.xhtml");
        return "refreshPage";
    }

    public List<Usuario> getUsuariosResponsaveis() {
        return Arrays.asList(new Usuario(), new Usuario(), new Usuario(), new Usuario());
    }
}
