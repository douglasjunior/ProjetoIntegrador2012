<div class="rrcs index">
	<h2><?php echo __('Rrcs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id');?></th>
			<th><?php echo $this->Paginator->sort('dataCriacao');?></th>
			<th><?php echo $this->Paginator->sort('produto');?></th>
			<th><?php echo $this->Paginator->sort('quantidadeReprovado');?></th>
			<th><?php echo $this->Paginator->sort('contato');?></th>
			<th><?php echo $this->Paginator->sort('quantidadeRecebido');?></th>
			<th><?php echo $this->Paginator->sort('documentoOrigem');?></th>
			<th><?php echo $this->Paginator->sort('numeroDeLote');?></th>
			<th><?php echo $this->Paginator->sort('placa');?></th>
			<th><?php echo $this->Paginator->sort('descricao');?></th>
			<th><?php echo $this->Paginator->sort('relatorio');?></th>
			<th><?php echo $this->Paginator->sort('anexo');?></th>
			<th><?php echo $this->Paginator->sort('setorOuEmpresa');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($rrcs as $rrc): ?>
	<tr>
		<td><?php echo h($rrc['Rrc']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rrc['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $rrc['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($rrc['Rrc']['dataCriacao']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['produto']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['quantidadeReprovado']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['contato']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['quantidadeRecebido']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['documentoOrigem']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['numeroDeLote']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['placa']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($rrc['Rrc']['relatorio']); ?>&nbsp;</td>
                <td> <a href="<?php echo h($rrc['Rrc']['anexo']); ?>" > <?php echo h($rrc['Rrc']['anexo']); ?> </a></td> 
		<td><?php echo h($rrc['Rrc']['setorOuEmpresa']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Add Anexo'), array('action' => 'addAnexo', $rrc['Rrc']['id'])); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rrc['Rrc']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rrc['Rrc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rrc['Rrc']['id']), null, __('Are you sure you want to delete # %s?', $rrc['Rrc']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rrc'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
