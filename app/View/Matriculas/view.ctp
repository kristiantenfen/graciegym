
<div class="span12">                    

    <div class="block-fluid ucard clearfix">

<div class="actions">
                    	<?php 
                            echo $this->Html->link(__('Editar'), array('controller' => 'matriculas', 'action' => 'edit', $matricula['Matricula']['id']), array('class' => 'btn '.$mensalidade['Mensalidade']['id'], 'title' => 'Editar vencimento')); 
                             if($matricula['Matricula']['status'] == 1){                            
                            echo $this->Form->postLink(__('Desabilitar'), array('action' => 'desabilita', $matricula['Matricula']['id']), array('class' => 'btn btn-warning', 'title' => 'Desabilitar'), __('Você deseja excluir o registro # %s?', $matricula['Matricula']['id'])); 
                            }else{
                            echo $this->Form->postLink(__('Ativar'), array('action' => 'ativar', $matricula['Matricula']['id']), array('class' => 'btn btn-success', 'title' => 'Ativar'));     
                            }
?>	
                        </div>
        <div class="info">                                                                
            <ul class="rows">
                <li class="heading"><?php  echo __('Matricula'); ?></li>

                <li>
                    		 <div class='title'><?php echo __('Atletas'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($matricula['Atleta']['nome'], array('controller' => 'atletas', 'action' => 'view', $matricula['Atleta']['id'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		 <div class='title'><?php echo __('Modalidades'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($matricula['Modalidade']['nome'], array('controller' => 'modalidades', 'action' => 'view', $matricula['Modalidade']['id'])); ?>
			&nbsp;
		</div>
                </li>

<li>
                    		<div class='title'><?php echo __('Criado'); ?></div>
		 <div class='text'>
			<?php echo h($this->Locale->date($matricula['Matricula']['created'])); ?>
			&nbsp;
		</div>
                </li>
                                                         
                <li>
                    		<div class='title'><?php echo __('Vencimento'); ?></div>
		 <div class='text'>
			<?php echo h($this->Locale->date($matricula['Matricula']['vencimento'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Status'); ?></div>
		 <div class='text'>
			<?php switch($matricula['Matricula']['status']){
                                case 1:
                                    echo 'Ativo';
                                    break;
                                case 0:
                                    echo 'Inativo';
                                    break;
                             }
                                    
 ?>
			&nbsp;
		</div>
                </li>                                 
                                 
                <li>
                    		<div class='title'><?php echo __('Valor'); ?></div>
		 <div class='text'>
			<?php echo h($this->Number->currency($matricula['Matricula']['valor'], 'Br')); ?>
			&nbsp;
		</div>
                </li>
                                 
                         
                <li>
                    		<div class='title'><?php echo __('Horarios'); ?></div>
		 <div class='text'>
			<?php echo h($matricula['Matricula']['Horarios']); ?>
			&nbsp;
		</div>
                </li>
                                                                    
            </ul>                                                      
        </div>                        
<br/><br/>

<?php 
    echo $this->Form->postLink(__('Gerar novas mensalidades'), array('controller' => 'mensalidades', 'action' => 'gerar', $matricula['Matricula']['id']), array('class' => 'btn btn-success', 'title' => 'Gerar novas mensalidades'));
 ?>

<div class="info">                                                                
           
<div class="span12">                    
    <div class="head clearfix">
       
        <h1><?php echo __('Mensalidades'); ?></h1>      
                              
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='25%'<?php echo $this->Paginator->sort('Vencimento'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('Data pagamento'); ?></th>
                                            <th width='20%'<?php echo $this->Paginator->sort('Status'); ?></th>
                    
                    <th width='30%' class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($mensalidades as $mensalidade){ ?>
	<tr>
            
		<td><?php echo h($this->Locale->date($mensalidade['Mensalidade']['vencimento'])); ?>&nbsp;</td>
		<td class='data'><?php echo h($this->Locale->date($mensalidade['Mensalidade']['data_pagamento'])); ?>&nbsp;</td>
		
		<?php $status = 0;?>
		<td class='status'><?php switch($mensalidade['Mensalidade']['status']){
                            case 1:
                                echo 'Pago';
                                $status = 1;
                                break;
                            case 2:
                                echo 'Anulada';
                                $status = 2;
                                break;
                            case 0:
                                echo 'Pendente';
                                $status = 0;
                                break;
}
 ?>&nbsp;</td>
		<td class="actions">
			<?php 
                            if($status == 0){    
                            echo $this->Html->link(__('Pagar'), array('controller' => 'mensalidades', 'action' => 'pagar', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-success pagamento '.$mensalidade['Mensalidade']['id'], 'id' => $mensalidade['Mensalidade']['id'], 'title' => 'Efetuar pagamento')); 
                            echo $this->Html->link(__('Editar'), array('controller' => 'mensalidades', 'action' => 'edit', $mensalidade['Mensalidade']['id']), array('class' => 'btn '.$mensalidade['Mensalidade']['id'], 'title' => 'Editar vencimento')); 
                            echo $this->Html->link(__('Anular'), array('controller' => '#'), array('class' => 'btn btn-warning anular '.$mensalidade['Mensalidade']['id'], 'title' => 'Anular'));
                            echo $this->Html->link(__('Deletar'), array('controller' => 'mensalidades', 'action' => 'delete', $mensalidade['Mensalidade']['id'], $matricula['Matricula']['id']), array('class' => 'btn btn-danger '.$mensalidade['Mensalidade']['id'], 'title' => 'Deletar'), __('Você deseja excluir o registro de mensalidade'));
                           }
?>
</td>
	</tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

    
</div>
                                                    
        </div>
    </div>
</div> 