<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Editar usuário.'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('cnpj');
        echo $this->Form->input('nomeContato', array('label' => 'Pessoa p/ Contato'));
        echo $this->Form->input('cidade');
        echo $this->Form->input('telefone');
        echo $this->Form->input('email');
        echo $this->Form->input('departamento');
        echo $this->Form->input('tipo', array('options' => array('interno' => 'Administrador', 'externo' => 'Cliente')));
        echo $this->Form->input('username', array('label' => 'Usuário'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul>
        <li><?php echo $this->Form->postLink(__('Excluir usuário'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Você realmente deseja excluir o usuário %s?', $this->Form->value('User.nome'))); ?></li>
        <li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
    </ul>
</div>
