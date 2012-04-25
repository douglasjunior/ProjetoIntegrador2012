<div class="clientes index">
	<h2><?php echo __('Clientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nomeEmpresa');?></th>
			<th><?php echo $this->Paginator->sort('cnpj');?></th>
			<th><?php echo $this->Paginator->sort('cidade');?></th>
			<th><?php echo $this->Paginator->sort('nomeContato');?></th>
			<th><?php echo $this->Paginator->sort('telefone');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('usuario');?></th>
			<th><?php echo $this->Paginator->sort('senha');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nomeEmpresa']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cnpj']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nomeContato']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['usuario']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['senha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Cliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Cliente']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Rrcs'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rrc'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
