<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($user['User']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cnpj'); ?></dt>
		<dd>
			<?php echo h($user['User']['cnpj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($user['User']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NomeContato'); ?></dt>
		<dd>
			<?php echo h($user['User']['nomeContato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($user['User']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($user['User']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo h($user['User']['departamento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rrcs'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rrc'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rrcs');?></h3>
	<?php if (!empty($user['Rrc'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('DataCriacao'); ?></th>
		<th><?php echo __('Produto'); ?></th>
		<th><?php echo __('QuantidadeReprovado'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('QuantidadeRecebido'); ?></th>
		<th><?php echo __('DocumentoOrigem'); ?></th>
		<th><?php echo __('NumeroDeLote'); ?></th>
		<th><?php echo __('Placa'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Relatorio'); ?></th>
		<th><?php echo __('Anexo'); ?></th>
		<th><?php echo __('SetorOuEmpresa'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Rrc'] as $rrc): ?>
		<tr>
			<td><?php echo $rrc['id'];?></td>
			<td><?php echo $rrc['user_id'];?></td>
			<td><?php echo $rrc['dataCriacao'];?></td>
			<td><?php echo $rrc['produto'];?></td>
			<td><?php echo $rrc['quantidadeReprovado'];?></td>
			<td><?php echo $rrc['contato'];?></td>
			<td><?php echo $rrc['quantidadeRecebido'];?></td>
			<td><?php echo $rrc['documentoOrigem'];?></td>
			<td><?php echo $rrc['numeroDeLote'];?></td>
			<td><?php echo $rrc['placa'];?></td>
			<td><?php echo $rrc['descricao'];?></td>
			<td><?php echo $rrc['relatorio'];?></td>
			<td><?php echo $rrc['anexo'];?></td>
			<td><?php echo $rrc['setorOuEmpresa'];?></td>
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
