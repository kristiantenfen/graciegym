
<div class="span12">                    
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Modalidades'); ?></h1>      
        <ul class="buttons">

            <li>			<?php echo $this->Html->link(__(), array('action' => 'add', $modalidade['Modalidade']['id']), array('class' => 'isw-plus', 'title' => 'Adicionar '.modalidade)); ?>
            </li>
        </ul>                        
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='25%'<?php echo $this->Paginator->sort('Nome'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('Criado'); ?></th>
                    
                    <th width="10%" class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modalidades as $modalidade): ?>
	<tr>
		<td><?php echo h($modalidade['Modalidade']['nome']); ?>&nbsp;</td>
		<td><?php echo h($modalidade['Modalidade']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(), array('action' => 'view', $modalidade['Modalidade']['id']), array('class' => 'isb-zoom', 'title' => 'Visualizar')); ?>
			<?php echo $this->Html->link(__(), array('action' => 'edit', $modalidade['Modalidade']['id']), array('class' => 'isb-edit', 'title' => 'Editar')); ?>
			<?php echo $this->Form->postLink(__(), array('action' => 'delete', $modalidade['Modalidade']['id']), array('class' => 'isb-cancel', 'title' => 'Excluir'), __('Você deseja excluir o registro # %s?', $modalidade['Modalidade']['id'])); ?>
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
