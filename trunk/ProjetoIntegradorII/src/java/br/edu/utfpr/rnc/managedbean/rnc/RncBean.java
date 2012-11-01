package br.edu.utfpr.rnc.managedbean.rnc;

import br.edu.utfpr.rnc.dao.departamento.DepartamentoDao;
import br.edu.utfpr.rnc.dao.rnc.RncDao;
import br.edu.utfpr.rnc.dao.usuario.UsuarioDao;
import br.edu.utfpr.rnc.managedbean.GerenciadorPaginas;
import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import br.edu.utfpr.rnc.util.JsfUtil;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.net.URISyntaxException;
import java.util.*;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;
import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;
import javax.servlet.ServletOutputStream;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import net.sf.jasperreports.engine.*;
import net.sf.jasperreports.engine.util.JRLoader;

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
    private Rnc cabRNC;

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

    private void gerarNovaRnc() {
        Rnc novaRnc = new Rnc(rnc);
        novaRnc.setDataRnc(new Date());
        rncDao.criarEntidade(novaRnc);
        this.rnc.setNovaRnc(novaRnc);
        rnc.setFinalizado(true);
        rncDao.editar(this.rnc);
        this.rnc = novaRnc;
        ((GerenciadorPaginas) JsfUtil.getObjectFromSession("gerenciadorPaginas")).cadastroRNC();
    }

    private void finalizarRnc() {
        rnc.setFinalizado(true);
        rncDao.editar(rnc);
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

    public void aprovar() {
        Rnc rnc = (Rnc) JsfUtil.getObjectFromSession("rnc");
        this.rnc = rnc;
        this.rnc.setAprovado(true);
        this.salvar();

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
            if (rnc.getEficaz() != null) {
                if (rnc.getEficaz().equals("Não")) {
                    gerarNovaRnc();
                } else if (rnc.getEficaz().equals("Sim")) {
                    finalizarRnc();
                }
            } else {
                rnc = new Rnc();
                JsfUtil.addSuccessMessage("Concluído", "RNC salva com sucesso.");
            }
        } catch (Exception e) {
            e.printStackTrace();
            JsfUtil.addErrorMessage("ERRO", "Erro ao salvar RNC.");
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

    public Rnc getCabRNC() {
        return cabRNC;
    }

    public void setCabRNC(Rnc cabRNC) {
        this.cabRNC = cabRNC;
    }

    public Date getDataAtual() {
        return new Date();
    }
 
    public void imprimir(Rnc rnc) {
        String caminho = "/relatorios/rnc/rnc.jasper";

        Map parametros = new HashMap();

        parametros.put("rnc", rnc);

        System.out.println(getClass().getResource("../../../../../../../../relatorios/rnc/").toString());

        parametros.put("SUBREPORT_DIR", getClass().getResource("../../../../../../../../relatorios/rnc/").toString());

        FacesContext context = FacesContext.getCurrentInstance();

        HttpServletResponse response = (HttpServletResponse) context.getExternalContext().getResponse();

        //pega o caminho do arquivo .jasper da aplicação
        InputStream reportStream = context.getExternalContext().getResourceAsStream(caminho);

        /*
         * //envia a resposta com o MIME Type
         * if(tipoFormatoRelatorio.equals(TipoFormatoRelatorio.ACROBAT_PDF)){
         * response.setContentType("application/pdf"); }else
         * if(tipoFormatoRelatorio.equals(TipoFormatoRelatorio.PAGINA_HTML)){
         * response.setContentType("application/html"); }
         */
        response.setHeader("Content-Disposition", "attachment; filename=rnc.pdf");
        response.setContentType("application/download");
        response.setHeader("Pragma", "no-cache");
        try {
            ServletOutputStream servletOutputStream = response.getOutputStream();

            //envia para o navegador o PDF gerado
            JasperRunManager.runReportToPdfStream(reportStream, servletOutputStream, parametros, new JREmptyDataSource());
            servletOutputStream.flush();
            servletOutputStream.close();

        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            context.responseComplete();
        }
    }
//    public void imprimir(Rnc rnc) {
//        Map parametros = new HashMap();
//        parametros.put("rnc", rnc);
//
//        try {
//            HttpServletResponse response = ((HttpServletResponse) JsfUtil.getContext().getExternalContext().getResponse());
//
//            String caminho = "../../../../../../../../relatorios/rnc/rnc.jasper";
//            try {
//                // Carregando o modelo do relatório
//                System.out.println("1:" + getClass().getResource("").toURI().toString());
//                System.out.println("2:" + getClass().getResource(caminho).toURI().toString());
//            } catch (URISyntaxException ex) {
//                ex.printStackTrace();
//            } 
//            InputStream resource = this.getClass().getResourceAsStream(caminho);
//            // Configurando o FileResolver para caminhos relativos
////            String reportsDirPath = JsfUtil.getContext().getExternalContext().getRealPath("/relatorios/rnc") + "/";
////            File reportsDir = new File(reportsDirPath);
////            if (!reportsDir.exists()) {
////                throw new FileNotFoundException(String.valueOf(reportsDir));
////            }
//            //params.put(JRParameter.REPORT_FILE_RESOLVER, new SimpleFileResolver(reportsDir));
//
//            // Compilando o modelo em pdf e convertendo para array de bytes
//            byte[] bytes = JasperRunManager.runReportToPdf(resource, parametros);
//
//            // adicionando informações do relatório ao cabeçalho da resposta
//            response.setContentType("application/pdf");
//            response.addHeader("Content-Disposition", "attachment;filename=rnc.pdf");
//            response.setContentLength(bytes.length);
//
//            // Obtendo o fluxo de saída do servlet
//            ServletOutputStream servletOutputStream = response.getOutputStream();
//            // Escrevendo no fluxo de saída do servlet
//            servletOutputStream.write(bytes, 0, bytes.length);
//            servletOutputStream.flush();
//            servletOutputStream.close();
//
//            JsfUtil.getContext().responseComplete();
//
//        } catch (JRException ex) {
//            ex.printStackTrace();
//        } catch (IOException e) {
//            e.printStackTrace();
//        }
//    }
}
