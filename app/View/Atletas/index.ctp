
<div class="span12">      
    <div class="widget">
        <div class="input-append">
        <?php 
              echo $this->FilterForm->create();
              echo $this->FilterForm->input('nome', array('type' => 'text', 'id' => 'appendedInputButton','class' => 'span8', 'placeholder' => 'Nome'));
              echo $this->FilterForm->end(array('label' => 'Buscar', 'class' => 'btn span3', 'div' => false));
        
        ?>    
        </div>
<!--        <div class="input-append">

    <input id="widgetInputMessage" type="text" placeholder="search keyword..." name="search" style="width: 715px;"></input>
    <button class="btn btn-success" type="button"></button>

</div>-->
    </div>
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Atletas'); ?></h1>    
         
        <ul class="buttons">

            <li>			<?php echo $this->Html->link(__(), array('action' => 'add', $atleta['Atleta']['id']), array('class' => 'isw-plus', 'title' => 'Adicionar atleta')); ?>
            </li>
        </ul>                        
    </div>

    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                                            <th width='20%'<?php echo $this->Paginator->sort('nome'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('bairro'); ?></th>
                                            <th width='10%'<?php echo $this->Paginator->sort('cidade'); ?></th>
                                            <th width='15%'<?php echo $this->Paginator->sort('telefone'); ?></th>
                                            <th width='15%'<?php echo $this->Paginator->sort('celular'); ?></th>
                                            <th width='20%'<?php echo $this->Paginator->sort('email'); ?></th>
                    
                    <th width="10%" class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($atletas as $atleta): ?>
	<tr>
		<td><?php echo h($atleta['Atleta']['nome']); ?>&nbsp;</td>
		<td><?php echo h($atleta['Atleta']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($atleta['Atleta']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($atleta['Atleta']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($atleta['Atleta']['celular']); ?>&nbsp;</td>
		<td><?php echo h($atleta['Atleta']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(), array('action' => 'view', $atleta['Atleta']['id']), array('class' => 'isb-zoom', 'title' => 'Visualizar')); ?>
			<?php echo $this->Html->link(__(), array('action' => 'edit', $atleta['Atleta']['id']), array('class' => 'isb-edit', 'title' => 'Editar')); ?>
			<?php echo $this->Form->postLink(__(), array('action' => 'delete', $atleta['Atleta']['id']), array('class' => 'isb-cancel', 'title' => 'Excluir'), __('Você deseja excluir o registro # %s?', $atleta['Atleta']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>


            </tbody>
        </table>
    </div>

    <p>
        <?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} no total')
	));
	?>    </p>
    <div class="paging">
        <?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    </div>
</div>
