
<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php echo __('Add Matricula'); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo $this->Form->create('Matricula'); ?>
 <div class='row-form clearfix'> 
                        <div class='span3'>vencimento</div>
                        <?php 		echo $this->Form->input('vencimento',array('label' => false, 'type'=> 'text', 'class' => 'date',  'div' => array('class' => 'span3') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Valor</div>
                        <?php 		echo $this->Form->input('valor', array('class' => 'valor','label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Atleta</div>
    <div id='clienteServico'>
			<p><a data-toggle="modal" id="modalCliente" href="#myModal" class="btn btn-large btn-danger">Selecione o Atleta</a></p>
			
			
			</div>
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Modalidade</div>
                        <?php 		echo $this->Form->input('modalidades_id',array('label' => false, 'div' => array('class' => 'span4'), 'options' => $modalidades ));
 ?> 
                       </div> <div class='row-form clearfix'> 
                        <div class='span3'>Horarios</div>
                        <?php 		echo $this->Form->input('Horarios',array('label' => false, 'div' => array('class' => 'span9') ));
 ?> 
                       </div><?php echo $this->Form->end(array('label' => 'Salvar', 'id' => 'savaMatricula', 'class' => 'btn btn-success')); ?>

    </div>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" id='btnProdutos' class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Secione o cliente</h3>
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






