<?php

echo $this->Html->link('Inicial', array('controller' => 'rrcs', 'action' => 'index')) . ' | ';
echo $this->Html->link('RRCs', array('controller' => 'rrcs', 'action' => 'index')) . ' | ';
echo $this->Html->link('Usuários', array('controller' => 'users', 'action' => 'index')) . ' | ';
echo $this->Html->link('RNCs', array('controller' => 'rncs', 'action' => 'index'));
?>