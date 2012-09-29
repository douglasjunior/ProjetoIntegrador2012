<div class="users view">
    <h2><?php echo __('Usuário'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($user['User']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Cnpj'); ?></dt>
        <dd>
            <?php echo h($user['User']['cnpj']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Cidade'); ?></dt>
        <dd>
            <?php echo h($user['User']['cidade']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('NomeContato'); ?></dt>
        <dd>
            <?php echo h($user['User']['nomeContato']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Telefone'); ?></dt>
        <dd>
            <?php echo h($user['User']['telefone']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tipo'); ?></dt>
        <dd>
            <?php echo h($user['User']['tipo']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Departamento'); ?></dt>
        <dd>
            <?php echo h($user['User']['departamento']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar usuário'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Excluir usuário'), array('action' => 'delete', $user['User']['id']), null, __('Você realmente deseja excluir o usuário %s?', $user['User']['nome'])); ?> </li>
        <li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="related">
    <?php if (!empty($user['Rrc'])): ?>
    <h3><?php echo __('RRCs deste usuário.'); ?></h3>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Cód.'); ?></th>
                <th><?php echo __('Data'); ?></th>
                <th><?php echo __('Produto'); ?></th>
                <th><?php echo __('Placa'); ?></th>
                <th><?php echo __('Anexo'); ?></th>
                <th><?php echo __('Setor/Empresa'); ?></th>
                <th class="actions"><?php echo __(' '); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($user['Rrc'] as $rrc):
                ?>
                <tr>
                    <td><?php echo $rrc['id']; ?></td>
                    <td><?php echo formata_data($rrc['dataCriacao']); ?></td>
                    <td><?php echo $rrc['produto']; ?></td>
                    <td><?php echo $rrc['placa']; ?></td>
                    <td> <a href="../../<?php echo h($rrc['anexo']); ?>" > <?php echo $rrc['anexo']; ?> </a></td> 
                    <td><?php echo $rrc['setorOuEmpresa']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Visualizar'), array('controller' => 'rrcs', 'action' => 'view', $rrc['id'])); ?>
                        <?php echo $this->Html->link(__('Editar'), array('controller' => 'rrcs', 'action' => 'edit', $rrc['id'])); ?>
                        <?php echo $this->Form->postLink(__('Excluir'), array('controller' => 'rrcs', 'action' => 'delete', $rrc['id']), null, __('Você realmente deseja excluir a RRC nº %s?', $rrc['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
