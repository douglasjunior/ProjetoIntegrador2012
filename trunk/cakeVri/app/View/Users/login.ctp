<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Login de Usuário'); ?></legend>
        <?php
        echo $this->Form->input('username', array('label' => 'Nome de Usuário'));
        echo $this->Form->input('password', array('type' => 'password', 'label' => 'Senha'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Entrar')); ?>
</div> 
