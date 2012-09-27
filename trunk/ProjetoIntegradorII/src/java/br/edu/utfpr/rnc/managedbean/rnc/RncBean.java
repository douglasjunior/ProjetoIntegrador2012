package br.edu.utfpr.rnc.managedbean.rnc;

import br.edu.utfpr.rnc.dao.departamento.DepartamentoDao;
import br.edu.utfpr.rnc.dao.rnc.RncDao;
import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;

@ManagedBean(name = "rncBean")
@RequestScoped
public class RncBean {

    @EJB
    private DepartamentoDao departamentoDao;
    @EJB
    private UsuarioDao usuarioDao;
    @EJB
    private RncDao rncDao;
    private Rnc rnc;

    public RncBean() {
        this.rnc = new Rnc();
    }

    @FacesConverter(forClass = Rnc.class)
    public static class RncConverter implements Converter {

        @Override
        public Object getAsObject(FacesContext facesContext, UIComponent component, String value) {
            if (value == null || value.length() == 0 || value.equals("null")) {
                return null;
            }
            RncBean rncBean = (RncBean) facesContext.getApplication().getELResolver().
                    getValue(facesContext.getELContext(), null, "rncBean");
            return rncBean.rncDao.buscar(getKey(value));
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
            if (object instanceof Rnc) {
                Rnc o = (Rnc) object;
                return getStringKey(o.getId());
            } else {
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + Rnc.class.getName());
            }
        }
    }

    public RncBean.RncConverter getConverter() {
        return new RncBean.RncConverter();
    }

    public Rnc getRnc() {
        return rnc;
    }

    public void setRnc(Rnc rnc) {
        this.rnc = rnc;
    }
    public void salvar(){
        
    }
    public void clearFields(){
        
    }
}
