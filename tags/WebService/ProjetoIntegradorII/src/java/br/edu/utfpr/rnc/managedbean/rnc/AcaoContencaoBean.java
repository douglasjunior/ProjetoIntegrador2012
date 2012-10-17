package br.edu.utfpr.rnc.managedbean.rnc;

import br.edu.utfpr.rnc.dao.rnc.AcaoContencaoDao;
import br.edu.utfpr.rnc.pojo.rnc.AcaoContencao;
import br.edu.utfpr.rnc.util.JsfUtil;
import java.util.List;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.SessionScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;
import javax.faces.event.ActionEvent;

@ManagedBean(name = "acaoContencaoBean")
@SessionScoped
public class AcaoContencaoBean {

    @EJB
    private AcaoContencaoDao acaoContencaoDao;
    private AcaoContencao acao = new AcaoContencao();
    @ManagedProperty(value = "#{rncBean}")
    private RncBean rncBean;

    public AcaoContencaoBean() {
    }

    public void setRncBean(RncBean rncBean) {
        this.rncBean = rncBean;
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

    public List<AcaoContencao> getAcoes() {
        return rncBean.getRnc().getAcoesDeContencao();
    }

    public AcaoContencao getAcao() {
        return acao;
    }

    public void setAcao(AcaoContencao acao) {
        this.acao = acao;
    }

    public void add() {
        System.out.println("add: " + acao.getDescricao() + " " + acao.getResponsavel() + " " + acao.getPrazo());

        if (!rncBean.getRnc().addAcaoContencao(acao)) {
            JsfUtil.addErrorMessage("Erro", "Ação de contenção já adicionada.");
        } else {
            acao = new AcaoContencao();
        }
    }

    public void remover(AcaoContencao ac) {
        System.out.println("remove: " + ac.getDescricao() + " " + ac.getResponsavel() + " " + ac.getPrazo());
        
        rncBean.getRnc().removeAcaoContencao(ac);
    }
}
