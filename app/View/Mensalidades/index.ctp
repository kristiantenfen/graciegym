
<div class="span12">       
      <div class="headInfo">
        <?php 
              echo $this->FilterForm->create();
              echo "<div class='span4'>".$this->FilterForm->input('status', array('label' => 'Status'));
              echo $this->FilterForm->input('modalidades', array('label' => 'Modalidade'))."</div>";
              echo $this->FilterForm->input('vencimento', array('type' => 'text', 'class' => 'date', 'label' => 'Vencimento'));
              echo $this->FilterForm->input('pagamento', array('type' => 'text', 'class' => 'date', 'label' => 'Pagamento'));
              echo '<br/><br/>'; 
              echo "<div style='margin-left: 25px;'>".$this->FilterForm->end(array('label' => 'Buscar', 'class' => 'btn btn-info', 'div' => true))."</div>";
        ?>    
        </div> 
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Mensalidades'); ?></h1>      
                         
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr>                        <th width='25%'<?php echo $this->Paginator->sort('Atleta'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('Modalidade'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('Status'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('Valor'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('Valor pago'); ?></th>
                                            <th width='15%'<?php echo $this->Paginator->sort('Vencimento'); ?></th>
                                            <th width='15%'<?php echo $this->Paginator->sort('Data Pagamento'); ?></th>
                    
                </tr>
            </thead>
            <tbody>
                 <?php $total = (float) 0.00; 
                       $total_matricula = (float) 0.00; 
                 ?>
                <?php foreach ($mensalidades as $mensalidade): ?>
                <tr> 
            <td><?php echo h($mensalidade['Matricula']['Atleta']['nome']); ?>&nbsp;</td>
            <td><?php echo h($mensalidade['Matricula']['Modalidade']['nome']); ?>&nbsp;</td>
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
                <td><?php echo h($this->Number->currency($mensalidade['Matricula']['valor'], 'Br')); ?>&nbsp;</td>
		<td><?php echo h($this->Number->currency($mensalidade['Mensalidade']['valor_pago'], 'Br')); ?>&nbsp;</td>
		<td><?php echo h($this->Locale->date($mensalidade['Mensalidade']['vencimento'])); ?>&nbsp;</td>
                <td><?php echo h($this->Locale->date($mensalidade['Mensalidade']['data_pagamento'])); ?>&nbsp;</td>
	</tr>
         <?php $total += $mensalidade['Mensalidade']['valor_pago']; 
                $total_matricula += $mensalidade['Matricula']['valor'];
         
         ?>
<?php endforeach; ?>
<tr>
            <td><b>Total</b></td>
            <td></td>
            <td></td>
            <td><b><?php
        echo $this->Number->currency($total_matricula, 'Br');
        ?></b></td>
            <td><b><?php
        echo $this->Number->currency($total, 'Br');
        ?>
                </b></td>
            
            <td></td>
            <td></td>

        </tr>

            </tbody>
        </table>
    </div>

    
   
</div>
