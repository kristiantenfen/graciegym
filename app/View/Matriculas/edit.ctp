
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Editar Matricula'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Matricula'); ?>
 <div class='row-form clearfix'>
     <div class='row-form clearfix'> 
                        <div class='span3'>Atleta</div>
                        <?php 	echo '<span>'.$matricula['Atleta']['nome'].'</span>';
 ?> 
                       
                        <?php 		echo $this->Form->input('id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Vencimento</div>
                        <?php 		echo $this->Form->input('vencimento',array('value' => $this->Locale->date($matricula['Matricula']['vencimento']), 'type' => 'text', 'label' => false, 'class' => 'date', 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>status</div>
                        <?php 		echo $this->Form->input('status',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>valor</div>
                        <?php 		echo $this->Form->input('valor',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Modalidade</div>
                        <?php 		echo $this->Form->input('modalidades_id',array('label' => false, 'div' => array('class' => 'span9'), 'options' => $modalidades ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Horarios</div>
                        <?php 		echo $this->Form->input('Horarios',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div><?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>

    </div>
</div>







