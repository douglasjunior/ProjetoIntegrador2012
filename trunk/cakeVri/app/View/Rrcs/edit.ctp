<div class="rrcs form">
    <?php echo $this->Form->create('Rrc'); ?>
    <fieldset>
        <legend><?php echo __('Edição de Reclamação de Cliente'); ?></legend>
        <?php
        echo $this->Form->input('descricao', array('label' => 'Descrição'));
        echo $this->Form->input('produto');
        echo $this->Form->input('quantidadeReprovado');
        echo $this->Form->input('contato');
        echo $this->Form->input('quantidadeRecebido');
        echo $this->Form->input('documentoOrigem');
        echo $this->Form->input('numeroDeLote', array('label' => 'Número do Lote'));
        echo $this->Form->input('placa');
        echo $this->Form->input('relatorio', array('label' => 'Relatório'));
        echo $this->Form->input('setorOuEmpresa', array('label' => 'Setor ou Empresa'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul>
        <li><?php echo $this->element('botaoVoltar'); ?></li>
    </ul>
</div>
