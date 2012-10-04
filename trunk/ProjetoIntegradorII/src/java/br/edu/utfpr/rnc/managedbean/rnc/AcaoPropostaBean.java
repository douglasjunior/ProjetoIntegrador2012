package br.edu.utfpr.rnc.managedbean.rnc;

import br.edu.utfpr.rnc.dao.rnc.AcaoPropostaDao;
import br.edu.utfpr.rnc.pojo.rnc.AcaoContencao;
import br.edu.utfpr.rnc.pojo.rnc.AcaoProposta;
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

@ManagedBean(name = "acaoPropostaBean")
@SessionScoped
public class AcaoPropostaBean {

    @EJB
    private AcaoPropostaDao acaoPropostaDao;
    private AcaoProposta acao = new AcaoProposta();
    @ManagedProperty(value = "#{rncBean}")
    private RncBean rncBean;

    public AcaoPropostaBean() {
    }

    public void setRncBean(RncBean rncBean) {
        this.rncBean = rncBean;
    }

    public String reinit() {
        acao = new AcaoProposta();
        return null;
    }

    @FacesConverter(forClass = AcaoProposta.class)
    public static class AcaoPropostaConverter implements Converter {

        @Override
        public Object getAsObject(FacesContext facesContext, UIComponent component, String value) {
            if (value == null || value.length() == 0 || value.equals("null")) {
                return null;
            }
            AcaoPropostaBean acaoPropostaBean = (AcaoPropostaBean) facesContext.getApplication().getELResolver().
                    getValue(facesContext.getELContext(), null, "acaoPropostaBean");
            return acaoPropostaBean.acaoPropostaDao.buscar(getKey(value));
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
            if (object instanceof AcaoProposta) {
                AcaoProposta o = (AcaoProposta) object;
                return getStringKey(o.getId());
            } else {
                throw new IllegalArgumentException("object " + object + " is of type " + object.getClass().getName() + "; expected type: " + AcaoProposta.class.getName());
            }
        }
    }

    public AcaoPropostaBean.AcaoPropostaConverter getConverter() {
        return new AcaoPropostaBean.AcaoPropostaConverter();
    }

    public List<AcaoProposta> getAcoes() {
        return rncBean.getRnc().getAcoesPropostas();
    }

    public AcaoProposta getAcao() {
        return acao;
    }

    public void setAcao(AcaoProposta acao) {
        this.acao = acao;
    }

    public void add() {
        System.out.println("add: " + acao.getDescricao() + " " + acao.getResponsavel() + " " + acao.getPrazo());

        if (!rncBean.getRnc().addAcaoProposta(acao)) {
            JsfUtil.addErrorMessage("Erro", "Ação proposta já adicionada.");
        } else {
            acao = new AcaoProposta();
        }
    }  

    public void remover(AcaoProposta ap) {
        System.out.println("remove: " + ap.getDescricao() + " " + ap.getResponsavel() + " " + ap.getPrazo());
        
        rncBean.getRnc().removeAcaoProposta(ap);
    }
}
