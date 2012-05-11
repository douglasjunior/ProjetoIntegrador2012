<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Login de Usuário'); ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password', array('type' => 'password'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Entrar')); ?>
</div>
