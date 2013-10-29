
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Edit Graduacao'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Graduacao'); ?>
 <div class='row-form clearfix'> 
                        <?php 		echo $this->Form->input('id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div><div class='row-form clearfix'> 
                        <div class='span3'>Atleta</div>
                        <?php 		echo $graduacao['Atleta']['nome'];
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>inicio</div>
                        <?php 		echo $this->Form->input('inicio',array('type' => 'text', 'class' => 'date', 'value' => $this->Locale->date($graduacao['Graduacao']['inicio']), 'label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div>  <div class='row-form clearfix'> 
                        <div class='span3'>faixas_id</div>
                        <?php 		echo $this->Form->input('faixas_id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>fim</div>
                        <?php 		echo $this->Form->input('fim',array('type' => 'text', 'class' => 'date','label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div>  <div class='row-form clearfix'> 
                        <div class='span3'>graus</div>
                        <?php 		echo $this->Form->input('graus',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div><?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>

    </div>
</div>







