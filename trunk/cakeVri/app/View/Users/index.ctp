<div class="users index">
    <h2><?php echo __('Usuários'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Cód.'); ?></th>
            <th><?php echo $this->Paginator->sort('Nome/Empresa'); ?></th>
            <th><?php echo $this->Paginator->sort('Tipo'); ?></th>
            <th><?php echo $this->Paginator->sort('Departamento'); ?></th>
            <th class="actions"><?php echo __(' '); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['nome']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['tipo']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['departamento']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $user['User']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $user['User']['id']), null, __('Você realmente deseja excluir o usuário %s?', $user['User']['nome'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}.')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('Próximo') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Cadastrar Usuário'), array('action' => 'add')); ?></li>
    </ul>
</div>
