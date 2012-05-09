<div class="rrcs view">
<h2><?php  echo __('Rrc');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rrc['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $rrc['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DataCriacao'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['dataCriacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['produto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QuantidadeReprovado'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['quantidadeReprovado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contato'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['contato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QuantidadeRecebido'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['quantidadeRecebido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DocumentoOrigem'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['documentoOrigem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NumeroDeLote'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['numeroDeLote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placa'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['placa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relatorio'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['relatorio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anexo'); ?></dt>
		<dd>
                    <a href="../../<?php echo h($rrc['Rrc']['anexo']); ?>" > <?php echo h($rrc['Rrc']['anexo']); ?> </a>
			&nbsp;
		</dd>
		<dt><?php echo __('SetorOuEmpresa'); ?></dt>
		<dd>
			<?php echo h($rrc['Rrc']['setorOuEmpresa']); ?>
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
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
