<div class="rrcs form">
<?php echo $this->Form->create('Rrc');?>
	<fieldset>
		<legend><?php echo __('Add Rrc'); ?></legend>
	<?php
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('dataCriacao');
		echo $this->Form->input('produto');
		echo $this->Form->input('quantidadeReprovado');
		echo $this->Form->input('contato');
		echo $this->Form->input('quantidadeRecebido');
		echo $this->Form->input('documentoOrigem');
		echo $this->Form->input('numeroDeLote');
		echo $this->Form->input('placa');
		echo $this->Form->input('descricao');
		echo $this->Form->input('relatorio');
		echo $this->Form->input('anexo');
		echo $this->Form->input('setorOuEmpresa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rrcs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
