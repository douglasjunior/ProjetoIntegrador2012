/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.utfpr.rnc.pojo.rnc;

import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import java.io.Serializable;
import java.util.Date;
import javax.persistence.*;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcelo
 */
@Entity
public class AcaoProposta implements Serializable {
    
    @Id
    @NotNull
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    private String descricao;
  
    @Temporal(javax.persistence.TemporalType.DATE)
    private Date prazo;
    private boolean concluido;
    @ManyToOne
    private Usuario responsavel;
    @ManyToOne
    private Rnc rnc;
    
    public AcaoProposta() {
    }
    
    public int getId() {
        return id;
    }
    
    public void setId(int id) {
        this.id = id;
    }
    
    public boolean isConcluido() {
        return concluido;
    }
    
    public void setConcluido(boolean concluido) {
        this.concluido = concluido;
    }
    
    public String getDescricao() {
        return descricao;
    }
    
    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }
    
    public Date getPrazo() {
        return prazo;
    }
    
    public void setPrazo(Date prazo) {
        this.prazo = prazo;
    }
    
    public Usuario getResponsavel() {
        return responsavel;
    }
    
    public void setResponsavel(Usuario responsavel) {
        this.responsavel = responsavel;
    }
    
    public Rnc getRnc() {
        return rnc;
    }
    
    public void setRnc(Rnc rnc) {
        this.rnc = rnc;
    }    
    
    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final AcaoProposta other = (AcaoProposta) obj;
        if (!(this.descricao + this.responsavel).equals(other.descricao + other.responsavel)) {
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
}
