<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Editar dados do usuário.'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('cnpj');
        if ($user['User']['tipo'] == 'interno') {
            echo $this->Form->input('departamento');
        }
        echo $this->Form->input('nomeContato', array('label' => 'Pessoa p/ Contato'));
        echo $this->Form->input('cidade');
        echo $this->Form->input('telefone');
        echo $this->Form->input('email');
        if (AuthComponent::user('tipo') == 'interno') {
            echo $this->Form->input('tipo', array('options' => array('interno' => 'Administrador', 'externo' => 'Cliente')));
        }
        echo $this->Form->input('username', array('label' => 'Usuário', 'readonly' => true));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Alterar senha'), array('action' => 'alterarSenha', $user['User']['id'])); ?></li>
        <li><?php echo $this->element('botaoVoltar'); ?></li>
    </ul>
</div>