package main;

import com.thoughtworks.selenium.DefaultSelenium;
import com.thoughtworks.selenium.SeleneseTestBase;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;

public class TesteCadastroUsuario extends SeleneseTestBase {

    @Before
    public void setUp() throws Exception {
        selenium = new DefaultSelenium("localhost", 4444, "*firefox", "http://localhost:8080/");
        selenium.start();
    }

    @Test
    public void testECadastroUsuario() throws Exception {
        selenium.open("/ProjetoIntegradorII/");
        selenium.click("css=#j_idt22 > span.ui-menuitem-text");
        selenium.waitForPageToLoad("30000");
        selenium.type("id=nome", "Marcelo");
        selenium.type("id=login", "marcelo");
        selenium.type("id=email", "marcelo@hotmail.com");
        selenium.type("id=senha", "marcelo");
        selenium.type("id=senha2", "marcelo");
        selenium.click("id=save");
        selenium.waitForPageToLoad("30000");
    }

    @After
    public void tearDown() throws Exception {
        selenium.stop();
    }
}
