<div class="rncs view">
<h2><?php  echo __('Rnc');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['produto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DataCriacao'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['dataCriacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QuantidadeReprovado'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['quantidadeReprovado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QuantidadeRecebido'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['quantidadeRecebido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DocumentoOrigem'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['documentoOrigem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NumeroDeLote'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['numeroDeLote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placa'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['placa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relatorio'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['relatorio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anexo'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['anexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SetorOuEmpresa'); ?></dt>
		<dd>
			<?php echo h($rnc['Rnc']['setorOuEmpresa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rnc'), array('action' => 'edit', $rnc['Rnc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rnc'), array('action' => 'delete', $rnc['Rnc']['id']), null, __('Are you sure you want to delete # %s?', $rnc['Rnc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rncs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rnc'), array('action' => 'add')); ?> </li>
	</ul>
</div>
