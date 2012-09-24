<div class="rncs form">
<?php echo $this->Form->create('Rnc');?>
	<fieldset>
		<legend><?php echo __('Add Rnc'); ?></legend>
	<?php
		echo $this->Form->input('produto');
		echo $this->Form->input('dataCriacao');
		echo $this->Form->input('quantidadeReprovado');
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

		<li><?php echo $this->Html->link(__('List Rncs'), array('action' => 'index'));?></li>
	</ul>
</div>
