package br.edu.utfpr.rnc.managedbean.rnc;

import br.edu.utfpr.rnc.dao.rnc.AcaoContencaoDao;
import br.edu.utfpr.rnc.pojo.rnc.AcaoContencao;
import java.util.ArrayList;
import java.util.List;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;


@ManagedBean(name = "acaoContencaoBean")
@ViewScoped
public class AcaoContencaoBean {

    @EJB
    private AcaoContencaoDao acaoContencaoDao;
    private AcaoContencao acao = new AcaoContencao();
    private List<AcaoContencao> acoes = new ArrayList<AcaoContencao>();

    public AcaoContencaoBean() {
        
    }

    public String reinit() {
        acao = new AcaoContencao();
        return null;
    }

    @FacesConverter(forClass = AcaoContencao.class)
    public static class AcaoContencaoConverter implements Converter {

        @Override
        public Object getAsObject(FacesContext facesContext, UIComponent component, String value) {
            if (value == null || value.length() == 0 || value.equals("null")) {
                return null;
            }
            AcaoContencaoBean acaoContencaoBean = (AcaoContencaoBean) facesContext.getApplication().getELResolver().
                    getValue(facesContext.getELContext(), null, "acaoContencaoBean");
            return acaoContencaoBean.acaoContencaoDao.buscar(getKey(value));
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
            if (object instanceof AcaoContencao) {
                AcaoContencao o = (AcaoContencao) object;
                return getStringKey(o.getId());
            } else {
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + AcaoContencao.class.getName());
            }
        }
    }

    public AcaoContencaoBean.AcaoContencaoConverter getConverter() {
        return new AcaoContencaoBean.AcaoContencaoConverter();
    }

    public AcaoContencao getAcao() {
        return acao;
    }

    public void setAcao(AcaoContencao acao) {
        this.acao = acao;
    }

    public List<AcaoContencao> getAcoes() {
        return acoes;
    }

    public void setAcoes(List<AcaoContencao> acoes) {
        this.acoes = acoes;
    }
}
