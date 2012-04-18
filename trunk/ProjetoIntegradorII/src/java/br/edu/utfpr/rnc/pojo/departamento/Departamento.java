package br.edu.utfpr.rnc.pojo.departamento;

import br.edu.utfpr.rnc.pojo.usuario.Usuario;
import java.io.Serializable;
import javax.persistence.*;

@Entity(name = "Departamento")
public class Departamento implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int codigo;
    private String nome;
    @JoinColumn(name = "Usuario_id", referencedColumnName = "id", nullable = false)
    @ManyToOne(optional = false)
    private Usuario responsavel;

    public int getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public Usuario getResponsavel() {
        return responsavel;
    }

    public void setResponsavel(Usuario responsavel) {
        this.responsavel = responsavel;
    }
}
