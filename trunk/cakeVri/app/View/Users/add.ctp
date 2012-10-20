<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Cadastro de Usuário'); ?></legend>
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('cnpj');
        echo $this->Form->input('nomeContato', array('label' => 'Pessoa p/ Contato'));
        echo $this->Form->input('cidade');
        echo $this->Form->input('telefone');
        echo $this->Form->input('email');
        echo $this->Form->input('departamento');
        echo $this->Form->input('tipo', array('options' => array('interno' => 'Administrador', 'externo' => 'Cliente')));
        echo $this->Form->input('username', array('label' => 'Usuário'));
        echo $this->Form->input('password', array('type' => 'password', 'label' => 'Senha'));
        echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => 'Confirma Senha', 'allowEmpty' => false));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul>
        <li><a href="#" onclick="javascript:history.back(2)" >Voltar</a></li>
    </ul>
</div>
