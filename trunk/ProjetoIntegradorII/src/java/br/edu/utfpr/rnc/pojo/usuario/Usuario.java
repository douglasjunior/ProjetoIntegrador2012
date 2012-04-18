package br.edu.utfpr.rnc.pojo.usuario;

import br.edu.utfpr.rnc.pojo.departamento.Departamento;
import java.io.Serializable;
import java.util.List;
import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;

@Entity(name="Usuario")
public class Usuario implements Serializable {
    @Id
    @GeneratedValue(strategy= GenerationType.IDENTITY)
    private Integer id;
    
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "responsavel")
    private List<Departamento> departamento;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }
    
}
