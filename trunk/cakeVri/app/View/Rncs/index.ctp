<div class="rncs">
    <h2><?php echo __('Registro de Não Conformidades'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Cód.'); ?></th>
            <th><?php echo $this->Paginator->sort('Cód. Produto'); ?></th>
            <th><?php echo $this->Paginator->sort('Data'); ?></th>
            <th><?php echo $this->Paginator->sort('Descrição'); ?></th>
            <th><?php echo $this->Paginator->sort('Doc. Origem'); ?></th>
            <th><?php echo $this->Paginator->sort('N. Lote'); ?></th>
            <th><?php echo $this->Paginator->sort('Origem RNC'); ?></th>
            <th><?php echo $this->Paginator->sort('Setor/Empresa'); ?></th>
            <th class="actions"><?php echo __(' '); ?></th>
        </tr>
        <?php foreach ($rncs as $rnc): ?>
            <tr>
                <td><?php echo h($rnc['Rnc']['ID']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['CODIGOPRODUTO']); ?>&nbsp;</td>
                <td><?php echo h(formata_data($rnc['Rnc']['DATARNC'])); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['DESCRICAONC']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['DOCUMENTOORIGEM']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['NUMEROLOTE']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['ORIGEMRNC']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['EMPRESAEMITENTE']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $rnc['Rnc']['ID'])); ?>
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
