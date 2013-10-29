
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Edit Mensalidade'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Mensalidade'); ?>
 <div class='row-form clearfix'> 
                        <div class='span3'>id</div>
                        <?php 		echo $this->Form->input('id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>status</div>
                        <?php 		echo $this->Form->input('status',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>matriculas_id</div>
                        <?php 		echo $this->Form->input('matriculas_id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>valor_pago</div>
                        <?php 		echo $this->Form->input('valor_pago',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>vencimento</div>
                        <?php 		echo $this->Form->input('vencimento',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div><?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>

    </div>
</div>







