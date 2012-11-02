
package clientdesktopws;

import javax.xml.bind.JAXBElement;
import javax.xml.bind.annotation.XmlElementDecl;
import javax.xml.bind.annotation.XmlRegistry;
import javax.xml.namespace.QName;


/**
 * This object contains factory methods for each 
 * Java content interface and Java element interface 
 * generated in the clientdesktopws package. 
 * <p>An ObjectFactory allows you to programatically 
 * construct new instances of the Java representation 
 * for XML content. The Java representation of XML 
 * content can consist of schema derived interfaces 
 * and classes representing the binding of schema 
 * type definitions, element declarations and model 
 * groups.  Factory methods for each of these are 
 * provided in this class.
 * 
 */
@XmlRegistry
public class ObjectFactory {

    private final static QName _ListarRncs_QNAME = new QName("http://webservice.rnc.utfpr.edu.br/", "listarRncs");
    private final static QName _HelloResponse_QNAME = new QName("http://webservice.rnc.utfpr.edu.br/", "helloResponse");
    private final static QName _ListarRncsResponse_QNAME = new QName("http://webservice.rnc.utfpr.edu.br/", "listarRncsResponse");
    private final static QName _Hello_QNAME = new QName("http://webservice.rnc.utfpr.edu.br/", "hello");

    /**
     * Create a new ObjectFactory that can be used to create new instances of schema derived classes for package: clientdesktopws
     * 
     */
    public ObjectFactory() {
    }

    /**
     * Create an instance of {@link Hello }
     * 
     */
    public Hello createHello() {
        return new Hello();
    }

    /**
     * Create an instance of {@link ListarRncs }
     * 
     */
    public ListarRncs createListarRncs() {
        return new ListarRncs();
    }

    /**
     * Create an instance of {@link ListarRncsResponse }
     * 
     */
    public ListarRncsResponse createListarRncsResponse() {
        return new ListarRncsResponse();
    }

    /**
     * Create an instance of {@link RncService }
     * 
     */
    public RncService createRncService() {
        return new RncService();
    }

    /**
     * Create an instance of {@link HelloResponse }
     * 
     */
    public HelloResponse createHelloResponse() {
        return new HelloResponse();
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link ListarRncs }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://webservice.rnc.utfpr.edu.br/", name = "listarRncs")
    public JAXBElement<ListarRncs> createListarRncs(ListarRncs value) {
        return new JAXBElement<ListarRncs>(_ListarRncs_QNAME, ListarRncs.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link HelloResponse }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://webservice.rnc.utfpr.edu.br/", name = "helloResponse")
    public JAXBElement<HelloResponse> createHelloResponse(HelloResponse value) {
        return new JAXBElement<HelloResponse>(_HelloResponse_QNAME, HelloResponse.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link ListarRncsResponse }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://webservice.rnc.utfpr.edu.br/", name = "listarRncsResponse")
    public JAXBElement<ListarRncsResponse> createListarRncsResponse(ListarRncsResponse value) {
        return new JAXBElement<ListarRncsResponse>(_ListarRncsResponse_QNAME, ListarRncsResponse.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link Hello }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://webservice.rnc.utfpr.edu.br/", name = "hello")
    public JAXBElement<Hello> createHello(Hello value) {
        return new JAXBElement<Hello>(_Hello_QNAME, Hello.class, null, value);
    }

}
