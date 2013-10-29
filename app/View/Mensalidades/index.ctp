
<div class="span12">       
      <div class="headInfo">
        <?php 
              echo $this->FilterForm->create();
              echo $this->FilterForm->input('status', array('label' => 'Status'));
              echo $this->FilterForm->input('modalidades', array('label' => 'Modalidade'));
              echo $this->FilterForm->end(array('label' => 'Buscar', 'class' => 'btn btn-info', 'div' => true));
        ?>    
        </div> 
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Mensalidades'); ?></h1>      
        <ul class="buttons">

            <li>			<?php echo $this->Html->link(__(), array('action' => 'add', $mensalidade['Mensalidade']['id']), array('class' => 'isw-plus', 'title' => 'Adicionar '.mensalidade)); ?>
            </li>
        </ul>                        
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='25%'<?php echo $this->Paginator->sort('status'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('valor_pago'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('vencimento'); ?></th>
                    
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensalidades as $mensalidade): ?>
	<tr>
		<td><?php switch($mensalidade['Mensalidade']['status']){
                                case 1:
                                    echo 'Pago';
                                    break;
                                case 2:
                                    echo 'Anulada';
                                    break;
                                case 0:
                                    echo 'Pendente';
                                    break;
                        
                    
                    
                }
?>&nbsp;</td>
                
		<td><?php echo h($this->Number->currency($mensalidade['Mensalidade']['valor_pago'], 'Br')); ?>&nbsp;</td>
		<td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(), array('action' => 'view', $mensalidade['Mensalidade']['id']), array('class' => 'isb-zoom', 'title' => 'Visualizar')); ?>
			<?php echo $this->Html->link(__(), array('action' => 'edit', $mensalidade['Mensalidade']['id']), array('class' => 'isb-edit', 'title' => 'Editar')); ?>
			<?php echo $this->Form->postLink(__(), array('action' => 'delete', $mensalidade['Mensalidade']['id']), array('class' => 'isb-cancel', 'title' => 'Excluir'), __('Você deseja excluir o registro # %s?', $mensalidade['Mensalidade']['id'])); ?>
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
