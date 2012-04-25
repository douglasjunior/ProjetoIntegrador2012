<div class="clientes view">
<h2><?php  echo __('Cliente');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NomeEmpresa'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nomeEmpresa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cnpj'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['cnpj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NomeContato'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nomeContato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['senha']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rrcs'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rrc'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rrcs');?></h3>
	<?php if (!empty($cliente['Rrc'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cliente['Rrc'] as $rrc): ?>
		<tr>
			<td><?php echo $rrc['id'];?></td>
			<td><?php echo $rrc['cliente_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rrcs', 'action' => 'view', $rrc['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rrcs', 'action' => 'edit', $rrc['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rrcs', 'action' => 'delete', $rrc['id']), null, __('Are you sure you want to delete # %s?', $rrc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rrc'), array('controller' => 'rrcs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
