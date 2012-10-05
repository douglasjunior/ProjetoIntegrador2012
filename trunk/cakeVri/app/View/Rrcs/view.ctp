<div class="rrcs view">
    <h2><?php echo __('Registros de Reclamações de Clientes'); ?></h2>
    <dl>
        <dt><?php echo __('Cód.'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Cód. RNC'); ?></dt>
        <dd>
            <?php
            if ($rrc['Rrc']['rnc_id'] == NULL) {
                echo "Aguardando aprovação";
            } else {
                echo $this->Html->link($rrc['Rrc']['rnc_id'], array('controller' => 'rncs', 'action' => 'view', $rrc['Rrc']['rnc_id']));
            }
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Dono/Cliente'); ?></dt>
        <dd>
            <?php echo $this->Html->link($rrc['User']['nome'], array('controller' => 'users', 'action' => 'view', $rrc['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Data'); ?></dt>
        <dd>
            <?php echo h(formata_data($rrc['Rrc']['dataCriacao'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Produto'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['produto']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Qtd. Reprovado'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['quantidadeReprovado']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Contato'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['contato']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Qtd. Recebido'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['quantidadeRecebido']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Doc. Origem'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['documentoOrigem']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('N. Lote'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['numeroDeLote']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Placa'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['placa']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Descrição'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['descricao']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Relatório'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['relatorio']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Anexo'); ?></dt>
        <dd>
            <a href="../../<?php echo h($rrc['Rrc']['anexo']); ?>" > <?php echo h($rrc['Rrc']['anexo']); ?> </a>
            &nbsp;
        </dd>
        <dt><?php echo __('Setor/Empresa'); ?></dt>
        <dd>
            <?php echo h($rrc['Rrc']['setorOuEmpresa']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Opções'); ?></h3>
    <ul>
        <?php if ($rrc['Rrc']['rnc_id'] == NULL) { ?>
            <li><?php echo $this->Form->postLink(__('Aprovar RRC'), array('action' => 'aprovar', $rrc['Rrc']['id']), null, __('Deseja aprovar a RRC # %s?', $rrc['Rrc']['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Editar RRC'), array('action' => 'edit', $rrc['Rrc']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Excluir RRC'), array('action' => 'delete', $rrc['Rrc']['id']), null, __('Deseja excluir a RRC # %s?', $rrc['Rrc']['id'])); ?> </li>
        <?php } ?>
        <li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
    </ul>
</div>
