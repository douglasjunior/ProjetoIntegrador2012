/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.utfpr.rnc.webservice;

import br.edu.utfpr.rnc.pojo.rnc.Rnc;
import java.io.Serializable;
import java.util.Date;

/**
 *
 * @author Douglas
 */
public class RNCService implements Serializable {

    private int id;
    private Date dataRnc;
    private String origemRnc;
    private String descricaoNc;
    private String relatorio;
    private String codigoProduto;
    private String descricaoProduto;
    private int quantidadeRecebida;
    private int quantidadeReprovada;
    private String documentoOrigem;
    private String numeroLote;
    private String placa;
    private String responsavel;
    private String emitente;
    private String setorResponsavel;
    private String setorEmitente;
    private String disposicao;
    private String causaProvavel;
    private String abrangenciaDaAcao;
    private String empresaEmitente;
    private boolean rrc;
    private boolean aprovado;
    private boolean finalizado;
    private String tipoAcaoProposta;
    private Date dataAnalise;
    private String comentarioAnalise;
    private String eficaz;

    public RNCService(Rnc rnc) {
        this.id = rnc.getId();
        this.dataRnc = rnc.getDataRnc();
        this.origemRnc = rnc.getOrigemRnc();
        this.descricaoNc = rnc.getDescricaoNc();
        this.relatorio = rnc.getRelatorio();
        this.codigoProduto = rnc.getCodigoProduto();
        this.descricaoProduto = rnc.getDescricaoProduto();
        this.quantidadeRecebida = rnc.getQuantidadeRecebida();
        this.quantidadeReprovada = rnc.getQuantidadeReprovada();
        this.documentoOrigem = rnc.getDocumentoOrigem();
        this.numeroLote = rnc.getNumeroLote();
        this.placa = rnc.getPlaca();
        this.responsavel = rnc.getResponsavel() + "";
        this.emitente = rnc.getEmitente() + "";
        this.setorResponsavel = rnc.getSetorResponsavel() + "";
        this.setorEmitente = rnc.getSetorEmitente() + "";
        this.disposicao = rnc.getDisposicao();
        this.causaProvavel = rnc.getCausaProvavel();
        this.abrangenciaDaAcao = rnc.getAbrangenciaDaAcao();
        this.empresaEmitente = rnc.getEmpresaEmitente();
        this.rrc = rnc.isRrc();
        this.aprovado = rnc.isRrc();
        this.aprovado = rnc.isAprovado();
        this.finalizado = rnc.isFinalizado();
        this.tipoAcaoProposta = rnc.getTipoAcaoProposta();
        this.dataAnalise = rnc.getDataAnalise();
        this.comentarioAnalise = rnc.getComentarioAnalise();
        this.eficaz = rnc.getEficaz();
    }

    public String getAbrangenciaDaAcao() {
        return abrangenciaDaAcao;
    }

    public void setAbrangenciaDaAcao(String abrangenciaDaAcao) {
        this.abrangenciaDaAcao = abrangenciaDaAcao;
    }

    public boolean isAprovado() {
        return aprovado;
    }

    public void setAprovado(boolean aprovado) {
        this.aprovado = aprovado;
    }

    public String getCausaProvavel() {
        return causaProvavel;
    }

    public void setCausaProvavel(String causaProvavel) {
        this.causaProvavel = causaProvavel;
    }

    public String getCodigoProduto() {
        return codigoProduto;
    }

    public void setCodigoProduto(String codigoProduto) {
        this.codigoProduto = codigoProduto;
    }

    public String getComentarioAnalise() {
        return comentarioAnalise;
    }

    public void setComentarioAnalise(String comentarioAnalise) {
        this.comentarioAnalise = comentarioAnalise;
    }

    public Date getDataAnalise() {
        return dataAnalise;
    }

    public void setDataAnalise(Date dataAnalise) {
        this.dataAnalise = dataAnalise;
    }

    public Date getDataRnc() {
        return dataRnc;
    }

    public void setDataRnc(Date dataRnc) {
        this.dataRnc = dataRnc;
    }

    public String getDescricaoNc() {
        return descricaoNc;
    }

    public void setDescricaoNc(String descricaoNc) {
        this.descricaoNc = descricaoNc;
    }

    public String getDescricaoProduto() {
        return descricaoProduto;
    }

    public void setDescricaoProduto(String descricaoProduto) {
        this.descricaoProduto = descricaoProduto;
    }

    public String getDisposicao() {
        return disposicao;
    }

    public void setDisposicao(String disposicao) {
        this.disposicao = disposicao;
    }

    public String getDocumentoOrigem() {
        return documentoOrigem;
    }

    public void setDocumentoOrigem(String documentoOrigem) {
        this.documentoOrigem = documentoOrigem;
    }

    public String getEficaz() {
        return eficaz;
    }

    public void setEficaz(String eficaz) {
        this.eficaz = eficaz;
    }

    public String getEmpresaEmitente() {
        return empresaEmitente;
    }

    public void setEmpresaEmitente(String empresaEmitente) {
        this.empresaEmitente = empresaEmitente;
    }

    public boolean isFinalizado() {
        return finalizado;
    }

    public void setFinalizado(boolean finalizado) {
        this.finalizado = finalizado;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNumeroLote() {
        return numeroLote;
    }

    public void setNumeroLote(String numeroLote) {
        this.numeroLote = numeroLote;
    }

    public String getOrigemRnc() {
        return origemRnc;
    }

    public void setOrigemRnc(String origemRnc) {
        this.origemRnc = origemRnc;
    }

    public String getPlaca() {
        return placa;
    }

    public void setPlaca(String placa) {
        this.placa = placa;
    }

    public int getQuantidadeRecebida() {
        return quantidadeRecebida;
    }

    public void setQuantidadeRecebida(int quantidadeRecebida) {
        this.quantidadeRecebida = quantidadeRecebida;
    }

    public int getQuantidadeReprovada() {
        return quantidadeReprovada;
    }

    public void setQuantidadeReprovada(int quantidadeReprovada) {
        this.quantidadeReprovada = quantidadeReprovada;
    }

    public String getRelatorio() {
        return relatorio;
    }

    public void setRelatorio(String relatorio) {
        this.relatorio = relatorio;
    }

    public String getEmitente() {
        return emitente;
    }

    public void setEmitente(String emitente) {
        this.emitente = emitente;
    }

    public String getResponsavel() {
        return responsavel;
    }

    public void setResponsavel(String responsavel) {
        this.responsavel = responsavel;
    }

    public String getSetorEmitente() {
        return setorEmitente;
    }

    public void setSetorEmitente(String setorEmitente) {
        this.setorEmitente = setorEmitente;
    }

    public String getSetorResponsavel() {
        return setorResponsavel;
    }

    public void setSetorResponsavel(String setorResponsavel) {
        this.setorResponsavel = setorResponsavel;
    }

    public boolean isRrc() {
        return rrc;
    }

    public void setRrc(boolean rrc) {
        this.rrc = rrc;
    }

    public String getTipoAcaoProposta() {
        return tipoAcaoProposta;
    }

    public void setTipoAcaoProposta(String tipoAcaoProposta) {
        this.tipoAcaoProposta = tipoAcaoProposta;
    }
}
