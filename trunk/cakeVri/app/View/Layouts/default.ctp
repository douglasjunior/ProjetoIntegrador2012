<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'Sistema de registro de reclamação de clientes');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <style type="text/css">
            body{
                overflow-y: scroll;
            }
        </style>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php //echo $title_for_layout;  ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>Sistema automatizado para registro de reclamações de clientes.</h1>
            </div>
            <?php if (AuthComponent::user() != NULL) { ?>
                <div id="opcoes">
                    <?php echo $this->Html->link('(' . AuthComponent::user('nome') . ')', array('controller' => 'users', 'action' => 'edit', AuthComponent::user('id'))); ?>
                    <?php echo $this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout')); ?>
                </div>
                <div id="menu">
                    <?php echo $this->element('menu'); ?>
                </div>
            <?php } ?>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">

                <p style="text-align: center;"> 
                    VRI Indústria Eletrônica LTDA <br />
                    SP: (11) 5084-8803 - vrisp@vri.com.br <br />
                    PR: (44) 3518-1200 - vripr@vri.com.br <br />
                </p>
                <?php
                /**
                  echo $this->Html->link(
                  $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
                  );
                 * 
                 */
                ?>
            </div>
        </div>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
