package br.edu.utfpr.rnc.managedbean.departamento;

import br.edu.utfpr.rnc.dao.departamento.DepartamentoDao;
import br.edu.utfpr.rnc.pojo.departamento.Departamento;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;

@ManagedBean(name = "departamentoBean")
@RequestScoped
public class DepartamentoBean {

    @EJB
    private DepartamentoDao departamentoDao;

    public DepartamentoBean() {
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
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + DepartamentoBean.class.getName());
            }
        }
    }
}
