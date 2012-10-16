package br.edu.utfpr.rnc.managedbean.rnc;

import br.edu.utfpr.rnc.dao.departamento.DepartamentoDao;
import br.edu.utfpr.rnc.dao.rnc.RncDao;
import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.managedbean.GerenciadorPaginas;
import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import br.edu.utfpr.rnc.util.JsfUtil;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;
import javax.servlet.http.HttpSession;

@ManagedBean(name = "rncBean")
@SessionScoped
public class RncBean {
    
    @EJB
    private DepartamentoDao departamentoDao;
    @EJB
    private UsuarioDao usuarioDao;
    @EJB
    private RncDao rncDao;
    private Rnc rnc;
    private List<String> origensRnc;
    private List<String> disposicoesRnc;
    
    public RncBean() {
        this.rnc = new Rnc();
        this.origensRnc = new ArrayList<String>(Arrays.asList("Reclamação de Cliente",
                "Auditoria de Qualidade",
                "Interna",
                "Fornecedor",
                "Metas",
                "Melhorias",
                "Pesquisa de Satisfação"));
        this.disposicoesRnc = new ArrayList<String>(Arrays.asList("Aceito com Desvio",
                "Sucatar",
                "Devolver",
                "Retrabalho Interno",
                "Retrabalho Externo"));
    }
    
    public List<String> getOrigensRnc() {
        if (rnc.getOrigemRnc() != null && !rnc.getOrigemRnc().isEmpty()) {
            if (!origensRnc.contains(rnc.getOrigemRnc())) {
                origensRnc.add(rnc.getOrigemRnc());
            }
        }
        return origensRnc;
    }
    
    public List<String> getDisposicoesRnc() {
        if (rnc.getDisposicao() != null && !rnc.getDisposicao().isEmpty()) {
            if (!disposicoesRnc.contains(rnc.getDisposicao())) {
                disposicoesRnc.add(rnc.getDisposicao());
            }
        }
        return disposicoesRnc;
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
    
    public void salvar() {
        try {
            System.out.println(rnc.getId());
            if (rnc.getId() == 0) {
                rncDao.criarEntidade(rnc);
            } else {
                rncDao.editar(rnc);
                ((GerenciadorPaginas) JsfUtil.getObjectFromSession("gerenciadorPaginas")).listarRNCs();
            }
            rnc = new Rnc();
            JsfUtil.addSuccessMessage("", "RNC salva com sucesso.");
        } catch (Exception e) {
            e.printStackTrace();
            JsfUtil.addErrorMessage("", "Erro ao salvar RNC.");
        }
    }
    
    public void clearFields() {
    }
    
    public void editar() {
        Rnc rnc = (Rnc) JsfUtil.getObjectFromRequestParameter("rnc");
        this.rnc = rnc;
    }
    
    public void remover() {
        try {
            Rnc rnc = (Rnc) JsfUtil.getObjectFromSession("rnc");
            rncDao.remover(rnc);
        } catch (Exception e) {
            e.printStackTrace();
        }
        removerRNCDaSessao();
    }
    
    public void adicionarRNCnaSessao() {
        Rnc rnc = (Rnc) JsfUtil.getObjectFromRequestParameter("rnc");
        HttpSession hs = JsfUtil.getSession(false);
        hs.setAttribute("rnc", rnc);
    }
    
    public void removerRNCDaSessao() {
        HttpSession hs = JsfUtil.getSession(false);
        hs.removeAttribute("rnc");
    }
    
    public List<Rnc> getTodasRNCs() {
        return rncDao.buscarTodos();
    }
}
