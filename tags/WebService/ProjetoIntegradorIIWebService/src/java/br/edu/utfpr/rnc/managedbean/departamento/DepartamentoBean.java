package br.edu.utfpr.rnc.managedbean.departamento;

import br.edu.utfpr.rnc.dao.departamento.DepartamentoDao;
import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.managedbean.GerenciadorPaginas;
import br.edu.utfpr.rnc.pojo.departamento.Departamento;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import br.edu.utfpr.rnc.util.JsfUtil;
import java.util.List;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;
import javax.servlet.http.HttpSession;

@ManagedBean(name = "departamentoBean")
@RequestScoped
public class DepartamentoBean {

    @EJB
    private DepartamentoDao departamentoDao;
    @EJB
    private UsuarioDao usuarioDao;
    private Departamento departamento;

    public DepartamentoBean() {
        departamento = new Departamento();
    }

    @FacesConverter(forClass = Departamento.class)
    public static class DepartamentoConverter implements Converter {

        @Override
        public Object getAsObject(FacesContext facesContext, UIComponent component, String value) {
            if (value == null || value.length() == 0 || value.equals("null")) {
                return null;
            }
            DepartamentoBean departamentoBean = (DepartamentoBean) facesContext.getApplication().getELResolver().
                    getValue(facesContext.getELContext(), null, "departamentoBean");
            return departamentoBean.departamentoDao.buscar(getKey(value));
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
            if (object instanceof Departamento) {
                Departamento o = (Departamento) object;
                return getStringKey(o.getId());
            } else {
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + Departamento.class.getName());
            }
        }
    }

    public DepartamentoConverter getConverter() {
        return new DepartamentoConverter();
    }

    public Departamento getDepartamento() {
        return departamento;
    }

    public void setDepartamento(Departamento departamento) {
        this.departamento = departamento;
    }

    public void salvar() {
        try {
            System.out.println(departamento.getId());
            if (departamento.getId() == 0) {
                departamentoDao.criarEntidade(departamento);
            } else {
                departamentoDao.editar(departamento);
                ((GerenciadorPaginas) JsfUtil.getObjectFromSession("gerenciadorPaginas")).consultaDepartamento();
            }
            departamento = new Departamento();
            JsfUtil.addSuccessMessage("", "Departamento salvo com sucesso.");
        } catch (Exception e) {
            e.printStackTrace();
            JsfUtil.addErrorMessage("", "Erro ao salvar departamento.");
        }
    }

    public List<Usuario> getUsuariosResponsaveis() {
        return usuarioDao.buscarTodos();
    }

    public List<Departamento> getTodosDepartamentos() {
        return departamentoDao.buscarTodos();
    }

    public void editar() {
        Departamento departamento = (Departamento) JsfUtil.getObjectFromRequestParameter("departamento");
        this.departamento = departamento;
    }

    public void remover() {
        Departamento departamento = (Departamento) JsfUtil.getObjectFromSession("departamento");
        departamentoDao.remover(departamento);
        JsfUtil.addSuccessMessage("Departamento removido com sucesso!", "");
        removerDepartamentoDaSessao();


    }

    public void adicionarDepartamentonaSessao() {
        Departamento departamento = (Departamento) JsfUtil.getObjectFromRequestParameter("departamento");
        HttpSession hs = JsfUtil.getSession(false);
        hs.setAttribute("departamento", departamento);
    }

    public void removerDepartamentoDaSessao() {
        HttpSession hs = JsfUtil.getSession(false);
        hs.removeAttribute("departamento");
    }
}
