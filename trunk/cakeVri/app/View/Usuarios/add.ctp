<div class="usuarios form">
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Add Usuario'); ?></legend>
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('cnpj');
        echo $this->Form->input('cidade');
        echo $this->Form->input('nomeContato');
        echo $this->Form->input('telefone');
        echo $this->Form->input('email');
        echo $this->Form->input('usuario');
        echo $this->Form->input('senha');
        echo $this->Form->select('interno', array('0' => 'Externo', '1' => 'Interno'), array('default' => '0', 'empty' => false));
        echo $this->Form->input('departamento');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Rrcs'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Rrc'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
    </ul>
</div>
