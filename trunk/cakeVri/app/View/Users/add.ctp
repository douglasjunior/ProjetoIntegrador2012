<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
        echo $this->Form->input('nome');
        echo $this->Form->input('cnpj');
        echo $this->Form->input('cidade');
        echo $this->Form->input('nomeContato');
        echo $this->Form->input('telefone');
        echo $this->Form->input('email');
        echo $this->Form->input('username');
        echo $this->Form->input('password', array('type' => 'password'));
        echo $this->Form->input('confirm_password', array('type' => 'password'));
        echo $this->Form->input('tipo', array('options' => array('interno' => 'Administrador', 'externo' => 'Cliente')));
        echo $this->Form->input('departamento');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Rrcs'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Rrc'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
    </ul>
</div>
