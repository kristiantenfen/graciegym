
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Add Atleta'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Atleta'); ?>
 <div class='row-form clearfix'> 
                        <div class='span3'>nome</div>
                        <?php 		echo $this->Form->input('nome',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>endereco</div>
                        <?php 		echo $this->Form->input('endereco',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div>  <div class='row-form clearfix'> 
                        <div class='span3'>Data nascimento</div>
                        <?php 		echo $this->Form->input('data_nascimento',array('type' => 'text', 'label' => false, 'class' => 'data', 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>bairro</div>
                        <?php 		echo $this->Form->input('bairro',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>cidade</div>
                        <?php 		echo $this->Form->input('cidade',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>cpf</div>
                        <?php 		echo $this->Form->input('cpf',array('label' => false, 'class' => 'cpf', 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>telefone</div>
                        <?php 		echo $this->Form->input('telefone',array('label' => false, 'class' => 'fone', 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>celular</div>
                        <?php 		echo $this->Form->input('celular',array('label' => false, 'class' => 'fone', 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>ocupacao</div>
                        <?php 		echo $this->Form->input('ocupacao',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>email</div>
                        <?php 		echo $this->Form->input('email',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Atestado medico</div>
                        <?php 		echo $this->Form->checkbox('atestado_medico',array('label' => false, 'hiddenField' => false));
                        
 ?> 
                       </div>
                       <!--<div class='row-form clearfix'>--> 
                          
                           
</div>
                           <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>
    <!--</div>-->







