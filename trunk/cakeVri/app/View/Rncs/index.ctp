<div class="rncs index">
    <h2><?php echo __('Rncs'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('Codigo Produto'); ?></th>
            <th><?php echo $this->Paginator->sort('Data'); ?></th>
            <th><?php echo $this->Paginator->sort('Descrição NC'); ?></th>
            <th><?php echo $this->Paginator->sort('Doc. Origem'); ?></th>
            <th><?php echo $this->Paginator->sort('N. Lote'); ?></th>
            <th><?php echo $this->Paginator->sort('Origem RNC'); ?></th>
            <th><?php echo $this->Paginator->sort('Qtd. Recebido'); ?></th>
            <th><?php echo $this->Paginator->sort('Qtd. Aprovado'); ?></th>
            <th><?php echo $this->Paginator->sort('Relatório'); ?></th>
            <th><?php echo $this->Paginator->sort('Empresa'); ?></th>
            <th class="actions"><?php echo __('Opções'); ?></th>
        </tr>
        <?php foreach ($rncs as $rnc): ?>
            <tr>
                <td><?php echo h($rnc['Rnc']['ID']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['CODIGOPRODUTO']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['DATARNC']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['DESCRICAONC']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['DOCUMENTOORIGEM']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['NUMEROLOTE']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['ORIGEMRNC']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['QUANTIDADERECEBIDA']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['QUANTIDADEREPROVADA']); ?>&nbsp;</td>
                <td><?php echo h($rnc['Rnc']['RELATORIO']); ?>&nbsp;</td>
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
