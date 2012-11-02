
package clientdesktopws;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlSchemaType;
import javax.xml.bind.annotation.XmlType;
import javax.xml.datatype.XMLGregorianCalendar;


/**
 * <p>Java class for rncService complex type.
 * 
 * <p>The following schema fragment specifies the expected content contained within this class.
 * 
 * <pre>
 * &lt;complexType name="rncService">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="abrangenciaDaAcao" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="aprovado" type="{http://www.w3.org/2001/XMLSchema}boolean"/>
 *         &lt;element name="causaProvavel" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="codigoProduto" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="comentarioAnalise" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="dataAnalise" type="{http://www.w3.org/2001/XMLSchema}dateTime" minOccurs="0"/>
 *         &lt;element name="dataRnc" type="{http://www.w3.org/2001/XMLSchema}dateTime" minOccurs="0"/>
 *         &lt;element name="descricaoNc" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="descricaoProduto" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="disposicao" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="documentoOrigem" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="eficaz" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="emitente" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="empresaEmitente" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="finalizado" type="{http://www.w3.org/2001/XMLSchema}boolean"/>
 *         &lt;element name="id" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="numeroLote" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="origemRnc" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="placa" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="quantidadeRecebida" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="quantidadeReprovada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="relatorio" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="responsavel" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="rrc" type="{http://www.w3.org/2001/XMLSchema}boolean"/>
 *         &lt;element name="setorEmitente" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="setorResponsavel" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="tipoAcaoProposta" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "rncService", propOrder = {
    "abrangenciaDaAcao",
    "aprovado",
    "causaProvavel",
    "codigoProduto",
    "comentarioAnalise",
    "dataAnalise",
    "dataRnc",
    "descricaoNc",
    "descricaoProduto",
    "disposicao",
    "documentoOrigem",
    "eficaz",
    "emitente",
    "empresaEmitente",
    "finalizado",
    "id",
    "numeroLote",
    "origemRnc",
    "placa",
    "quantidadeRecebida",
    "quantidadeReprovada",
    "relatorio",
    "responsavel",
    "rrc",
    "setorEmitente",
    "setorResponsavel",
    "tipoAcaoProposta"
})
public class RncService {

    protected String abrangenciaDaAcao;
    protected boolean aprovado;
    protected String causaProvavel;
    protected String codigoProduto;
    protected String comentarioAnalise;
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar dataAnalise;
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar dataRnc;
    protected String descricaoNc;
    protected String descricaoProduto;
    protected String disposicao;
    protected String documentoOrigem;
    protected String eficaz;
    protected String emitente;
    protected String empresaEmitente;
    protected boolean finalizado;
    protected int id;
    protected String numeroLote;
    protected String origemRnc;
    protected String placa;
    protected int quantidadeRecebida;
    protected int quantidadeReprovada;
    protected String relatorio;
    protected String responsavel;
    protected boolean rrc;
    protected String setorEmitente;
    protected String setorResponsavel;
    protected String tipoAcaoProposta;

    /**
     * Gets the value of the abrangenciaDaAcao property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getAbrangenciaDaAcao() {
        return abrangenciaDaAcao;
    }

    /**
     * Sets the value of the abrangenciaDaAcao property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setAbrangenciaDaAcao(String value) {
        this.abrangenciaDaAcao = value;
    }

    /**
     * Gets the value of the aprovado property.
     * 
     */
    public boolean isAprovado() {
        return aprovado;
    }

    /**
     * Sets the value of the aprovado property.
     * 
     */
    public void setAprovado(boolean value) {
        this.aprovado = value;
    }

    /**
     * Gets the value of the causaProvavel property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCausaProvavel() {
        return causaProvavel;
    }

    /**
     * Sets the value of the causaProvavel property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCausaProvavel(String value) {
        this.causaProvavel = value;
    }

    /**
     * Gets the value of the codigoProduto property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCodigoProduto() {
        return codigoProduto;
    }

    /**
     * Sets the value of the codigoProduto property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCodigoProduto(String value) {
        this.codigoProduto = value;
    }

    /**
     * Gets the value of the comentarioAnalise property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getComentarioAnalise() {
        return comentarioAnalise;
    }

    /**
     * Sets the value of the comentarioAnalise property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setComentarioAnalise(String value) {
        this.comentarioAnalise = value;
    }

    /**
     * Gets the value of the dataAnalise property.
     * 
     * @return
     *     possible object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public XMLGregorianCalendar getDataAnalise() {
        return dataAnalise;
    }

    /**
     * Sets the value of the dataAnalise property.
     * 
     * @param value
     *     allowed object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public void setDataAnalise(XMLGregorianCalendar value) {
        this.dataAnalise = value;
    }

    /**
     * Gets the value of the dataRnc property.
     * 
     * @return
     *     possible object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public XMLGregorianCalendar getDataRnc() {
        return dataRnc;
    }

    /**
     * Sets the value of the dataRnc property.
     * 
     * @param value
     *     allowed object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public void setDataRnc(XMLGregorianCalendar value) {
        this.dataRnc = value;
    }

    /**
     * Gets the value of the descricaoNc property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getDescricaoNc() {
        return descricaoNc;
    }

    /**
     * Sets the value of the descricaoNc property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setDescricaoNc(String value) {
        this.descricaoNc = value;
    }

    /**
     * Gets the value of the descricaoProduto property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getDescricaoProduto() {
        return descricaoProduto;
    }

    /**
     * Sets the value of the descricaoProduto property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setDescricaoProduto(String value) {
        this.descricaoProduto = value;
    }

    /**
     * Gets the value of the disposicao property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getDisposicao() {
        return disposicao;
    }

    /**
     * Sets the value of the disposicao property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setDisposicao(String value) {
        this.disposicao = value;
    }

    /**
     * Gets the value of the documentoOrigem property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getDocumentoOrigem() {
        return documentoOrigem;
    }

    /**
     * Sets the value of the documentoOrigem property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setDocumentoOrigem(String value) {
        this.documentoOrigem = value;
    }

    /**
     * Gets the value of the eficaz property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getEficaz() {
        return eficaz;
    }

    /**
     * Sets the value of the eficaz property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setEficaz(String value) {
        this.eficaz = value;
    }

    /**
     * Gets the value of the emitente property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getEmitente() {
        return emitente;
    }

    /**
     * Sets the value of the emitente property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setEmitente(String value) {
        this.emitente = value;
    }

    /**
     * Gets the value of the empresaEmitente property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getEmpresaEmitente() {
        return empresaEmitente;
    }

    /**
     * Sets the value of the empresaEmitente property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setEmpresaEmitente(String value) {
        this.empresaEmitente = value;
    }

    /**
     * Gets the value of the finalizado property.
     * 
     */
    public boolean isFinalizado() {
        return finalizado;
    }

    /**
     * Sets the value of the finalizado property.
     * 
     */
    public void setFinalizado(boolean value) {
        this.finalizado = value;
    }

    /**
     * Gets the value of the id property.
     * 
     */
    public int getId() {
        return id;
    }

    /**
     * Sets the value of the id property.
     * 
     */
    public void setId(int value) {
        this.id = value;
    }

    /**
     * Gets the value of the numeroLote property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getNumeroLote() {
        return numeroLote;
    }

    /**
     * Sets the value of the numeroLote property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setNumeroLote(String value) {
        this.numeroLote = value;
    }

    /**
     * Gets the value of the origemRnc property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getOrigemRnc() {
        return origemRnc;
    }

    /**
     * Sets the value of the origemRnc property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setOrigemRnc(String value) {
        this.origemRnc = value;
    }

    /**
     * Gets the value of the placa property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getPlaca() {
        return placa;
    }

    /**
     * Sets the value of the placa property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setPlaca(String value) {
        this.placa = value;
    }

    /**
     * Gets the value of the quantidadeRecebida property.
     * 
     */
    public int getQuantidadeRecebida() {
        return quantidadeRecebida;
    }

    /**
     * Sets the value of the quantidadeRecebida property.
     * 
     */
    public void setQuantidadeRecebida(int value) {
        this.quantidadeRecebida = value;
    }

    /**
     * Gets the value of the quantidadeReprovada property.
     * 
     */
    public int getQuantidadeReprovada() {
        return quantidadeReprovada;
    }

    /**
     * Sets the value of the quantidadeReprovada property.
     * 
     */
    public void setQuantidadeReprovada(int value) {
        this.quantidadeReprovada = value;
    }

    /**
     * Gets the value of the relatorio property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getRelatorio() {
        return relatorio;
    }

    /**
     * Sets the value of the relatorio property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setRelatorio(String value) {
        this.relatorio = value;
    }

    /**
     * Gets the value of the responsavel property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getResponsavel() {
        return responsavel;
    }

    /**
     * Sets the value of the responsavel property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setResponsavel(String value) {
        this.responsavel = value;
    }

    /**
     * Gets the value of the rrc property.
     * 
     */
    public boolean isRrc() {
        return rrc;
    }

    /**
     * Sets the value of the rrc property.
     * 
     */
    public void setRrc(boolean value) {
        this.rrc = value;
    }

    /**
     * Gets the value of the setorEmitente property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getSetorEmitente() {
        return setorEmitente;
    }

    /**
     * Sets the value of the setorEmitente property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setSetorEmitente(String value) {
        this.setorEmitente = value;
    }

    /**
     * Gets the value of the setorResponsavel property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getSetorResponsavel() {
        return setorResponsavel;
    }

    /**
     * Sets the value of the setorResponsavel property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setSetorResponsavel(String value) {
        this.setorResponsavel = value;
    }

    /**
     * Gets the value of the tipoAcaoProposta property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getTipoAcaoProposta() {
        return tipoAcaoProposta;
    }

    /**
     * Sets the value of the tipoAcaoProposta property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setTipoAcaoProposta(String value) {
        this.tipoAcaoProposta = value;
    }

}
