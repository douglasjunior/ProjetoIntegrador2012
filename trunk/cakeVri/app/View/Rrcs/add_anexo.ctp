<div class="rrcs form">
    <?php echo $this->Form->create('Rrc', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Adicionar Anexo na RRC'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('anexo', array('type' => 'file'));
        echo $this->Form->label('anexoAtual', "Anexo atual: " . h($rrc['Rrc']['anexo']));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul> 
        <li><a href="#" onclick="javascript:history.back(2)" >Voltar</a>/li>
    </ul>
</div>
