
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Editar Mensalidade'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Mensalidade'); ?>
 <div class='row-form clearfix'> 
                        <?php 		echo $this->Form->input('id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 

                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Vencimento</div>
                        <?php 		echo $this->Form->input('vencimento',array('label' => false, 'class' => 'date', 'type' => 'text', 'value' => $this->Locale->date($mensalidade['Mensalidade']['vencimento']), 'div' => array('class' => 'span9') ));
 ?>  
                      

    </div>
</div>
        <br/>
                           <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn span3')); ?>








