<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Alterar senha de usuário.'); ?></legend>
        <?php
        echo $this->Form->input('current_password', array('type' => 'password', 'label' => 'Senha atual', 'allowEmpty' => false));
        echo '<br />';
        echo $this->Form->input('new_password', array('type' => 'password', 'label' => 'Nova Senha', 'allowEmpty' => false));
        echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => 'Confirma Nova Senha', 'allowEmpty' => false));
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