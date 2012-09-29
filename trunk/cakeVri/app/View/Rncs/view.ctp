<div class="rncs view">
    <h2><?php echo __('Registro de Não Conformidades'); ?></h2>
    <dl>
        <dt><?php echo __('Cód.'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['ID']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Cód. Produto'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['CODIGOPRODUTO']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Data'); ?></dt>
        <dd>
            <?php echo h(formata_data($rnc['Rnc']['DATARNC'])); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Descrição'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['DESCRICAONC']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Doc. Origem'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['DOCUMENTOORIGEM']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('N. Lote'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['NUMEROLOTE']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Origem RNC'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['ORIGEMRNC']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Qtd. Reprovado'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['QUANTIDADEREPROVADA']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Qtd. Recebido'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['QUANTIDADERECEBIDA']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Relatório'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['RELATORIO']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Empresa'); ?></dt>
        <dd>
            <?php echo h($rnc['Rnc']['EMPRESAEMITENTE']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
