
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Add Graduacao'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Graduacao'); ?>
 <div class='row-form clearfix'> 
                        <div class='span3'>inicio</div>
                        <?php 		echo $this->Form->input('inicio',array('type' => 'text', 'class' => 'date', 'label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
 
                      
        <div class='span3'>Atleta</div>
    <div id='clienteServico'>
			<p><a data-toggle="modal" id="modalCliente" href="#myModal" class="btn btn-large btn-danger">Selecione o Atleta</a></p>
			
			
			</div>
        
        
       </div>   <div class='row-form clearfix'> 
                        <div class='span3'>faixas_id</div>
                        <?php 		echo $this->Form->input('faixas_id',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>fim</div>
                        <?php 		echo $this->Form->input('fim',array('type' => 'text', 'class' => 'date', 'label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div>  <div class='row-form clearfix'> 
                        <div class='span3'>graus</div>
                        <?php 		echo $this->Form->input('graus',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div>

    </div>
    <br/>
                           <?php echo $this->Form->end(array('label' => 'Salvar', 'id' => 'savaGraduacao', 'class' => 'btn span3')); ?>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" id='btnProdutos' class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Secione o Atleta</h3>
</div>
<div class="modal-body">

<input type='text' id='campoBusca' />

<div id='resultadoBusca'>

</div>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
</div>
</div>







