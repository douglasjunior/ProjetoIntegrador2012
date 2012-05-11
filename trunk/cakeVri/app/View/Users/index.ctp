<div class="users index">
    <h2><?php echo __('Users'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
            <th><?php echo $this->Paginator->sort('cnpj'); ?></th>
            <th><?php echo $this->Paginator->sort('cidade'); ?></th>
            <th><?php echo $this->Paginator->sort('nomeContato'); ?></th>
            <th><?php echo $this->Paginator->sort('telefone'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('tipo'); ?></th>
            <th><?php echo $this->Paginator->sort('departamento'); ?></th>
            <th class="actions"><?php echo __('Opções'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['nome']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['cnpj']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['cidade']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['nomeContato']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['telefone']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
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
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Cadastrar Usuário'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('RRCs Cadastradas'), array('controller' => 'rrcs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Cadastrar RRC'), array('controller' => 'rrcs', 'action' => 'add')); ?> </li>
    </ul>
</div>
