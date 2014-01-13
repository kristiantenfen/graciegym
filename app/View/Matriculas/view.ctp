
<div class="span12">                    

    <div class="block-fluid ucard clearfix">


        <div class="info">                                                                
            <ul class="rows">
                <li class="heading"><?php  echo __('Matricula'); ?></li>

                                                 
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
                                case 2:
                                    echo 'Inativo';
                                    break;
                             }
                                    
 ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Criado'); ?></div>
		 <div class='text'>
			<?php echo h($matricula['Matricula']['created']); ?>
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
                    		 <div class='title'><?php echo __('Atletas'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($matricula['Atleta']['nome'], array('controller' => 'atletas', 'action' => 'view', $matricula['Atletas']['id'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		 <div class='title'><?php echo __('Modalidades'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($matricula['Modalidade']['nome'], array('controller' => 'modalidades', 'action' => 'view', $matricula['Modalidades']['id'])); ?>
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
<div class="info">                                                                
           
<div class="span12">                    
    <div class="head clearfix">
       
        <h1><?php echo __('Mensalidades'); ?></h1>      
        <ul class="buttons">

            <li>			<?php //echo $this->Html->link(__(), array('action' => 'add', $matricula['Matricula']['id']), array('class' => 'isw-plus', 'title' => 'Adicionar '.matricula)); ?>
            </li>
        </ul>                        
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='25%'<?php echo $this->Paginator->sort('Vencimento'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('Data pagamento'); ?></th>
                                            <th width='25%'<?php echo $this->Paginator->sort('Status'); ?></th>
                    
                    <th width='25%' class="actions"><?php echo __('Ações'); ?></th>
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
                            echo $this->Html->link(__('Anular'), array('action' => 'edit', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-warning anular '.$mensalidade['Mensalidade']['id'], 'title' => 'Anular'));
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