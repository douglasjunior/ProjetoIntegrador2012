/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package br.edu.utfpr.rnc.pojo.usuario;

import br.edu.utfpr.rnc.pojo.departamento.Departamento;
import java.io.Serializable;
import java.util.List;
import javax.persistence.*;

/** 
 * 
 * @author NOTEBOOK
 */
@Entity
public class Papel implements Serializable{

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    private String nome;
    private String descricao;
     @OneToMany(mappedBy = "papel")
    private List<Usuario> usuarios;

    public List<Usuario> getUsuarios() {
        return usuarios;
    } 

    public String getDescricao() {
        return descricao;
    }
 
    public void setUsuarios(List<Usuario> usuarios) {
        this.usuarios = usuarios;
    } 
    
    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }    
         
    @Override
    public int hashCode() {
        int hash = 0;
        hash += (int) id;
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Papel)) {
            return false;
        }
        Papel other = (Papel) object;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.edu.utfpr.rnc.pojo.usuario.Papel[ id=" + id + " ]";
    }
}
