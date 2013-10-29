
<div class="span12">    
    <div class="headInfo">
        <?php 
              echo $this->FilterForm->create();
              echo $this->FilterForm->input('faixa', array('label' => 'Faixa'));
              echo $this->FilterForm->end(array('label' => 'Buscar', 'class' => 'btn btn-info', 'div' => true));
        ?>    
        </div> 
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Graduações'); ?></h1>      
        <ul class="buttons">

            <li>			<?php echo $this->Html->link(__(), array('action' => 'add', $graduacao['Graduacao']['id']), array('class' => 'isw-plus', 'title' => 'Adicionar '.graduacao)); ?>
            </li>
        </ul>                        
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='20%'<?php echo $this->Paginator->sort('Atleta'); ?></th>
                                            <th width='20%'<?php echo $this->Paginator->sort('Faixa'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('graus'); ?></th>
                                            <th width='20%'<?php echo $this->Paginator->sort('Inicio'); ?></th>
                                            <th width='20%'<?php echo $this->Paginator->sort('fim'); ?></th>
                    
                    <th width="10%" class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($graduacaos as $graduacao): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($graduacao['Atleta']['nome'], array('controller' => 'atletas', 'action' => 'view', $graduacao['Atletas']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($graduacao['Faixa']['cor'], array('controller' => 'faixas', 'action' => 'view', $graduacao['Faixas']['id'])); ?>
		</td>
		<td><?php echo h($graduacao['Graduacao']['graus']); ?>&nbsp;</td>
		<td><?php echo h($this->Locale->date($graduacao['Graduacao']['inicio'])); ?>&nbsp;</td>
		<td><?php echo h($this->Locale->date($graduacao['Graduacao']['fim'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(), array('action' => 'view', $graduacao['Graduacao']['id']), array('class' => 'isb-zoom', 'title' => 'Visualizar')); ?>
			<?php echo $this->Html->link(__(), array('action' => 'edit', $graduacao['Graduacao']['id']), array('class' => 'isb-edit', 'title' => 'Editar')); ?>
			<?php echo $this->Form->postLink(__(), array('action' => 'delete', $graduacao['Graduacao']['id']), array('class' => 'isb-cancel', 'title' => 'Excluir'), __('Você deseja excluir o registro # %s?', $graduacao['Graduacao']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>


            </tbody>
        </table>
    </div>

    <p>
        <?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} no total')
	));
	?>    </p>
    <div class="paging">
        <?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    </div>
</div>
