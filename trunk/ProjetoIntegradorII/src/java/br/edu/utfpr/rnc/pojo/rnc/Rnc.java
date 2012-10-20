package br.edu.utfpr.rnc.pojo.rnc;

import br.edu.utfpr.rnc.pojo.departamento.Departamento;
import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import javax.persistence.*;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcelo
 */
@Entity
public class Rnc implements Serializable {

    @Id
    @NotNull
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;// numero da rnc
    @NotNull
    @Temporal(TemporalType.TIMESTAMP)
    private Date dataRnc;
    @NotNull
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
    @ManyToOne
    private Usuario responsavel;
    @ManyToOne
    private Departamento setorResponsavel;
    @ManyToOne
    private Usuario emitente;
    @ManyToOne
    private Departamento setorEmitente;
    private String disposicao;
    private String causaProvavel;
    private String abrangenciaDaAcao;
    private String empresaEmitente;
    private boolean rrc;
    private boolean aprovado;
    private boolean finalizado;
    private String tipoAcaoProposta;
    @OneToMany(mappedBy = "rnc", orphanRemoval = true, cascade = CascadeType.ALL)
    private List<AcaoContencao> acoesDeContencao;
    @OneToMany(mappedBy = "rnc", orphanRemoval = true, cascade = CascadeType.ALL)
    private List<AcaoProposta> acoesPropostas;
    @Temporal(TemporalType.TIMESTAMP)
    private Date dataAnalise;
    private String comentarioAnalise;
    private String eficaz;
    @ManyToOne
    private Usuario veficadoPor;

    public Rnc() {
        acoesDeContencao = new ArrayList<AcaoContencao>();
        acoesPropostas = new ArrayList<AcaoProposta>();
    }

    public String getCodigoProduto() {
        return codigoProduto;
    }

    public void setCodigoProduto(String codigoProduto) {
        this.codigoProduto = codigoProduto;
    }

    public String getTipoAcaoProposta() {
        return tipoAcaoProposta;
    }

    public void setTipoAcaoProposta(String tipoAcaoProposta) {
        this.tipoAcaoProposta = tipoAcaoProposta;
    }

    public Date getDataAnalise() {
        return dataAnalise;
    }

    public void setDataAnalise(Date dataAnalise) {
        this.dataAnalise = dataAnalise;
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

    public String getDocumentoOrigem() {
        return documentoOrigem;
    }

    public void setDocumentoOrigem(String documentoOrigem) {
        this.documentoOrigem = documentoOrigem;
    }

    public Usuario getEmitente() {
        return emitente;
    }

    public void setEmitente(Usuario emitente) {
        this.emitente = emitente;
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

    public Usuario getResponsavel() {
        return responsavel;
    }

    public void setResponsavel(Usuario responsavel) {
        this.responsavel = responsavel;
    }

    public Departamento getSetorEmitente() {
        return setorEmitente;
    }

    public void setSetorEmitente(Departamento setorEmitente) {
        this.setorEmitente = setorEmitente;
    }

    public Departamento getSetorResponsavel() {
        return setorResponsavel;
    }

    public void setSetorResponsavel(Departamento setorResponsavel) {
        this.setorResponsavel = setorResponsavel;
    }

    public String getDisposicao() {
        return disposicao;
    }

    public void setDisposicao(String Disposicao) {
        this.disposicao = Disposicao;
    }

    public String getCausaProvavel() {
        return causaProvavel;
    }

    public void setCausaProvavel(String causaProvavel) {
        this.causaProvavel = causaProvavel;
    }

    public String getAbrangenciaDaAcao() {
        return abrangenciaDaAcao;
    }

    public void setAbrangenciaDaAcao(String abrangenciaDaAcao) {
        this.abrangenciaDaAcao = abrangenciaDaAcao;
    }

    public Date getDataRnc() {
        return dataRnc;
    }

    public void setDataRnc(Date dataRnc) {
        this.dataRnc = dataRnc;
    }

    public String getEmpresaEmitente() {
        return empresaEmitente;
    }

    public void setEmpresaEmitente(String empresaEmitente) {
        this.empresaEmitente = empresaEmitente;
    }

    public boolean isRrc() {
        return rrc;
    }

    public void setRrc(boolean rrc) {
        this.rrc = rrc;
    }

    public List<AcaoContencao> getAcoesDeContencao() {
        return acoesDeContencao;
    }

    public void setAcoesDeContencao(List<AcaoContencao> acoesDeContencao) {
        this.acoesDeContencao = acoesDeContencao;
    }

    public List<AcaoProposta> getAcoesPropostas() {
        return acoesPropostas;
    }

    public void setAcoesPropostas(List<AcaoProposta> acoesPropostas) {
        this.acoesPropostas = acoesPropostas;
    }

    public boolean isAprovado() {
        return aprovado;
    }

    public void setAprovado(boolean aprovado) {
        this.aprovado = aprovado;
    }

    public boolean isFinalizado() {
        return finalizado;
    }

    public void setFinalizado(boolean finalizado) {
        this.finalizado = finalizado;
    }

    public String getComentarioAnalise() {
        return comentarioAnalise;
    }

    public void setComentarioAnalise(String comentarioAnalise) {
        this.comentarioAnalise = comentarioAnalise;
    }

    public String getEficaz() {
        return eficaz;
    }

    public void setEficaz(String eficaz) {
        this.eficaz = eficaz;
    }

    public Usuario getVeficadoPor() {
        return veficadoPor;
    }

    public void setVeficadoPor(Usuario veficadoPor) {
        this.veficadoPor = veficadoPor;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Rnc other = (Rnc) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 29 * hash + this.id;
        return hash;
    }

    public boolean addAcaoContencao(AcaoContencao acao) {
        if (!acoesDeContencao.contains(acao)) {
            acoesDeContencao.add(acao);
            acao.setRnc(this);
            return true;
        }
        return false;
    }

    public void removeAcaoContencao(AcaoContencao acao) {
        acoesDeContencao.remove(acao);
        acao.setRnc(null);
    }

    public boolean addAcaoProposta(AcaoProposta acao) {
        if (!acoesPropostas.contains(acao)) {
            acoesPropostas.add(acao);
            acao.setRnc(this);
            return true;
        }
        return false;
    }

    public void removeAcaoProposta(AcaoProposta acao) {
        acoesPropostas.remove(acao);
        acao.setRnc(null);
    }

    @Override
    public String toString() {
        return "br.edu.utfpr.rnc.pojo.rnc.Rnc[ id=" + id + " ]";
    }
}
