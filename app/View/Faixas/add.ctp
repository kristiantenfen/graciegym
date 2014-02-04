
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Add Faixa'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Faixa'); ?>
 <div class='row-form clearfix'> 
                        <div class='span3'>cor</div>
                        <?php 		echo $this->Form->input('cor',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 

    </div>
</div>
    <br/>
                           <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn span3')); ?>







