
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Edit Modalidade'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Modalidade'); ?>
 <div class='row-form clearfix'> 
                        <?php 		echo $this->Form->input('id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>nome</div>
                        <?php 		echo $this->Form->input('nome',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 

                       </div><?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>

    </div>
</div>







