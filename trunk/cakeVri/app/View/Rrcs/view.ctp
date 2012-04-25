<div class="rrcs view">
<h2><?php  echo __('Rrc');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rrc['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $rrc['Cliente']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rrc'), array('action' => 'edit', $rrc['Rrc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rrc'), array('action' => 'delete', $rrc['Rrc']['id']), null, __('Are you sure you want to delete # %s?', $rrc['Rrc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rrcs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rrc'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
