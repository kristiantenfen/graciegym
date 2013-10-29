<div class="span12">    

    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Mensalidades'); ?></h1>      
                        
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='30%'<?php echo $this->Paginator->sort('Atleta'); ?></th>
                                            <th width='15%'<?php echo $this->Paginator->sort('Modalidade'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('vencimento'); ?></th>
                                            <th width='15%'<?php echo $this->Paginator->sort('Valor'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('Status'); ?></th>
                                            
                    
                    <th class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensalidades as $mensalidade): ?>
	<tr>
		<td><?php echo h($mensalidade['Matricula']['Atleta']['nome']); ?>&nbsp;</td>
		<td><?php echo h($mensalidade['Matricula']['Modalidade']['nome']); ?>&nbsp;</td>
                <td><?php echo h($this->Locale->date($mensalidade['Mensalidade']['vencimento'])); ?>&nbsp;</td>
                <td><?php echo h($this->Number->currency($mensalidade['Matricula']['valor'], 'Br')); ?>&nbsp;</td>
                <td><?php switch ($mensalidade['Matricula']['Modalidade']['nome']){
                                case 0:
                                    echo 'Pendente';
                                    break;
                                case 1:
                                    echo 'Pago';
                                    break;
                        
                }
?>&nbsp;</td>
                
		<td class="actions">
		<?php	 echo $this->Html->link(__('Pagar'), array('controller' => 'mensalidades', 'action' => 'pagar', $mensalidade['Mensalidade']['id']), array('class' => 'btn-success-pay pagamento '.$mensalidade['Mensalidade']['id'], 'id' => $mensalidade['Mensalidade']['id'], 'title' => 'Efetuar pagamento'));?>
		</td>
	</tr>
<?php endforeach; ?>


            </tbody>
        </table>
    </div>

   
</div>
