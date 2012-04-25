<div class="clientes form">
    <?php echo $this->Form->create('Cliente'); ?>
    <fieldset>
        <legend><?php echo __('Cadastrar Cliente'); ?></legend>
        <?php
        echo $this->Form->input('nomeEmpresa');
        echo $this->Form->input('cnpj');
        echo $this->Form->input('cidade');
        echo $this->Form->input('nomeContato');
        echo $this->Form->input('telefone');
        echo $this->Form->input('email');
        echo $this->Form->input('usuario');
        echo $this->Form->input('senha');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu:'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar RRCs'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova RRC'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
    </ul>
</div>
