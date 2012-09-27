package br.edu.utfpr.rnc.managedbean;

import java.io.Serializable;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean(name = "gerenciadorPaginas")
@SessionScoped
public class GerenciadorPaginas implements Serializable {

    private String cabecalho = "./paginas/cabecalho.xhtml";
    private String menu = "./paginas/menu.xhtml";
    private String conteudo = "./paginas/login.xhtml";
    private String rodape = "./paginas/rodape.xhtml";

    public GerenciadorPaginas() {
        
    }

    public String getConteudo() {
        return conteudo;
    }

    public void setConteudo(String conteudo) {
        this.conteudo = conteudo;
    }

    public String getMenu() {
        return menu;
    }

    public String getRodape() {
        return rodape;
    }

    public String getCabecalho() {
        return cabecalho;
    }

    public String cadastroDepartamento() {
        this.conteudo = "./paginas/departamento/cadastro.xhtml";
        return "refreshPage";
    }

    public String consultaDepartamento() {
        this.conteudo = "./paginas/departamento/listar.xhtml";
        return "refreshPage";
    }
    public String cadastroUsuario() {
        this.conteudo = "./paginas/usuario/cadastro.xhtml";
        return "refreshPage";
    }
    public String cadastroRNC() {
        this.conteudo = "./paginas/rnc/cadastro.xhtml";
        return "refreshPage";
    }

    public String consultaUsuario() {
        this.conteudo = "./paginas/usuario/listar.xhtml";
        return "refreshPage";
    }
        public String home() {
        this.conteudo = "./paginas/home.xhtml";
        return "refreshPage";
    }
}
