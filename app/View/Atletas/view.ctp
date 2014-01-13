
<div class="span12">                    

    <div class="block-fluid ucard clearfix">


        <div class="info">                                                                
            <ul class="rows">
                <li class="heading"><?php  echo __('Atleta'); ?></li>

                                    
                
                                 
                <li>
                    		<div class='title'><?php echo __('Nome'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['nome']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Endereco'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['endereco']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Status'); ?></div>
		 <div class='text'>
			<?php switch($atleta['Atleta']['status']){
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
			<?php echo h($atleta['Atleta']['created']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Data Nascimento'); ?></div>
		 <div class='text'>
			<?php echo h($this->Locale->date($atleta['Atleta']['data_nascimento'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Bairro'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['bairro']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Cidade'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['cidade']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Cpf'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['cpf']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Telefone'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['telefone']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Celular'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['celular']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Atestado Medico'); ?></div>
		 <div class='text'>
			<?php switch($atleta['Atleta']['atestado_medico']){
                                case 1:
                                    echo 'Entregue';
                                        break;
                                case 0:
                                    echo 'Pendente';
                                        break;


                        }
 ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Ocupacao'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['ocupacao']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Email'); ?></div>
		 <div class='text'>
			<?php echo h($atleta['Atleta']['email']); ?>
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
                                            <th width='12%'<?php echo $this->Paginator->sort('Vencimento'); ?></th>
<th width='15%'<?php echo $this->Paginator->sort('Valor'); ?></th>
                                            <th width='12%'<?php echo $this->Paginator->sort('Data pagamento'); ?></th>
<th width='10%'<?php echo $this->Paginator->sort('Modalidade'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('Status'); ?></th>
                    
                    <th width='25%' class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($mensalidades as &$mensalidade): 
                    
                 $status = 0;
                 switch($mensalidade['Mensalidade']['status']){
                            case 1:
                                $statusNome = 'Pago';
                                $status = 1;
                                $valor = $this->Number->currency($mensalidade['Mensalidade']['valor_pago'], 'Br');
                                break;
                            case 2:
                                $statusNome = 'Anulada';
                                $status = 2;
                                $valor = 'R$ 0,00';
                                break;
                            case 0:
                                $statusNome = 'Pendente';
                                $status = 0;
                                $valor = $this->Number->currency($mensalidade['Matricula']['valor'], 'Br');
                                break;
}
 




?>
	<tr>
		<td><?php echo h($this->Locale->date($mensalidade['Mensalidade']['vencimento'])); ?>&nbsp;</td>
<td><?php echo $valor; ?>&nbsp;</td>
		<td class='data'><?php echo h($this->Locale->date($mensalidade['Mensalidade']['data_pagamento'])); ?>&nbsp;</td>
<td><?php echo h($mensalidade['Modalidade']['nome']); ?>&nbsp;</td>
		

		<td class='status'><?php echo $statusNome?>&nbsp;</td>
		<td class="actions">
			<?php 
                            if($status == 0){    
                            echo $this->Html->link(__('Pagar'), array('controller' => 'mensalidades', 'action' => 'pagar', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-success pagamento '.$mensalidade['Mensalidade']['id'], 'id' => $mensalidade['Mensalidade']['id'], 'title' => 'Efetuar pagamento')); 
echo $this->Html->link(__('Editar'), array('controller' => 'mensalidades', 'action' => 'edit', $mensalidade['Mensalidade']['id']), array('class' => 'btn '.$mensalidade['Mensalidade']['id'], 'title' => 'Editar vencimento ')); 
                             echo $this->Html->link(__('Anular'), array('action' => 'edit', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-warning anular '.$mensalidade['Mensalidade']['id'], 'title' => 'Anular'));
  }
                            ?>
</td>
	</tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    
</div>
                                                    
        </div>
    </div>
</div> 


    </div>
</div> 
