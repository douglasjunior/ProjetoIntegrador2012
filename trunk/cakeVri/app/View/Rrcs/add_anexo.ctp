<div class="rrcs form">
    <?php echo $this->Form->create('Rrc', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Adicionar Anexo na RRC'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('anexo', array('type' => 'file'));
        echo $this->Form->label('anexoAtual', "Anexo atual: " . h($rrc['Rrc']['anexo']));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul> 
        <li><?php echo $this->Html->link(__('List Rrcs'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
