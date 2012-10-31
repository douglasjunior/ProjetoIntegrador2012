package br.edu.utfpr.rnc.dao;

import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.Query;

public abstract class DaoAbstrato<T> {

    private Class<T> classeEntidade;

    public DaoAbstrato(Class<T> classeEntidade) {
        this.classeEntidade = classeEntidade;
    }

    protected abstract EntityManager getEntityManager();

    public void criarEntidade(T entidade) {
        getEntityManager().persist(entidade);
    }

    public void editar(T entidade) {
        getEntityManager().merge(entidade);
    }

    public void remover(T entidade) {
        getEntityManager().remove(getEntityManager().merge(entidade));
    }

    public T buscar(Object codigo) {
        return (T) getEntityManager().find(classeEntidade, codigo);
    }

    public List<T> buscarTodos() {
        javax.persistence.criteria.CriteriaQuery cq = getEntityManager().getCriteriaBuilder().createQuery();
        cq.select(cq.from(classeEntidade));
        return getEntityManager().createQuery(cq).getResultList();
    }

    public List<T> buscarIntervalo(int[] intervalo) {
        javax.persistence.criteria.CriteriaQuery cq = getEntityManager().getCriteriaBuilder().createQuery();
        cq.select(cq.from(classeEntidade));
        javax.persistence.Query q = getEntityManager().createQuery(cq);
        q.setMaxResults(intervalo[1] - intervalo[0]);
        q.setFirstResult(intervalo[0]);
        return q.getResultList();
    }

    public int contar() {
        javax.persistence.criteria.CriteriaQuery cq = getEntityManager().getCriteriaBuilder().createQuery();
        javax.persistence.criteria.Root<T> rt = cq.from(classeEntidade);
        cq.select(getEntityManager().getCriteriaBuilder().count(rt));
        javax.persistence.Query q = getEntityManager().createQuery(cq);
        return ((Long) q.getSingleResult()).intValue();
    }

    public List<T> executeNamedQueryComParametros(String namedQuery, String[] parametros, Object[] objetos) {
        Query query = getEntityManager().createNamedQuery(namedQuery);
        if (parametros.length != objetos.length) {
            System.err.println("A quantidade de parametros difere da quantidade de atributos.");
            return null;
        }
        for (int i = 0; i < parametros.length; i++) {
            String atributo = parametros[i];
            Object parametro = objetos[i];
            query.setParameter(atributo, parametro);
        }
        List<T> list = query.getResultList();
        return list;
    }

    public List<T> executeNamedQuery(String namedQuery) {
        return getEntityManager().createNamedQuery(namedQuery).getResultList();
    }
}
