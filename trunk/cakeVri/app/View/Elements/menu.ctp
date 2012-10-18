<?php
if (AuthComponent::user('tipo') == 'interno') {
    echo $this->Html->link('Usuários', array('controller' => 'users', 'action' => 'index')) . ' | ';
    echo $this->Html->link('Todas RRCs', array('controller' => 'rrcs', 'action' => 'index')) . ' | ';
}
echo $this->Html->link('Minhas RRCs', array('controller' => 'rrcs', 'action' => 'index', 'minhas')) . ' | ';
?>