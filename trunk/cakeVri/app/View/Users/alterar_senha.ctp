<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Alterar senha de usuário.'); ?></legend>
        <?php
        echo $this->Form->input('current_password', array('type' => 'password', 'label' => 'Senha atual', 'required' => true));
        echo '<br />';
        echo $this->Form->input('new_password', array('type' => 'password', 'label' => 'Nova Senha', 'required' => true));
        echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => 'Confirma Nova Senha', 'required' => true));
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