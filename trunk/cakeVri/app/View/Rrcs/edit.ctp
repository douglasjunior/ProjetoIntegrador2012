<div class="rrcs form">
<?php echo $this->Form->create('Rrc');?>
	<fieldset>
		<legend><?php echo __('Edit Rrc'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cliente_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rrc.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rrc.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rrcs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
