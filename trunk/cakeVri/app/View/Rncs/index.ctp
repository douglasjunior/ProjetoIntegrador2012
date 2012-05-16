<div class="rncs index">
	<h2><?php echo __('Rncs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('produto');?></th>
			<th><?php echo $this->Paginator->sort('dataCriacao');?></th>
			<th><?php echo $this->Paginator->sort('quantidadeReprovado');?></th>
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
	foreach ($rncs as $rnc): ?>
	<tr>
		<td><?php echo h($rnc['Rnc']['id']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['produto']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['dataCriacao']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['quantidadeReprovado']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['quantidadeRecebido']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['documentoOrigem']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['numeroDeLote']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['placa']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['relatorio']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['anexo']); ?>&nbsp;</td>
		<td><?php echo h($rnc['Rnc']['setorOuEmpresa']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rnc['Rnc']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rnc['Rnc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rnc['Rnc']['id']), null, __('Are you sure you want to delete # %s?', $rnc['Rnc']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rnc'), array('action' => 'add')); ?></li>
	</ul>
</div>
