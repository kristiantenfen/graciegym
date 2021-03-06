
<div class="span12">   
    <div class="headInfo">
        <?php
        echo $this->FilterForm->create(); ?>
        <div class="row-form clearfix">
      <?php  echo $this->FilterForm->input('modalidade', array('label' => 'Modalidade', 'div' => array('class' => 'span4')));
        echo $this->FilterForm->input('status', array('label' => 'Status', 'div' => array('class' => 'span4'))); ?>
        </div>
        <div class="row-form clearfix">
<?php        echo $this->FilterForm->input('atleta', array('label' => 'Atleta', 'div' => array('class' => 'span8')));
?>
        </div>
        <div class="row-form clearfix">
            
        <?php echo $this->FilterForm->end(array('label' => 'Buscar', 'class' => 'btn btn-info span4', 'div' => false));
        ?>    
        </div>
    </div> 
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo __('Matriculas'); ?></h1>      
        <ul class="buttons">

            <li>			<?php echo $this->Html->link(__(), array('action' => 'add'), array('class' => 'isw-plus', 'title' => 'Adicionar')); ?>
            </li>
        </ul>                        
    </div>


    <div class="block-fluid">
        <table cellpadding="0" cellspacing="0" width="100%" class="table">
            <thead>
                <tr> 
                    <th width='20%'<?php echo $this->Paginator->sort('Atleta'); ?></th>
                    <th width='20%'<?php echo $this->Paginator->sort('Vencimento'); ?></th>
                    <th width='15%'<?php echo $this->Paginator->sort('Valor'); ?></th>
                    <th width='15%'<?php echo $this->Paginator->sort('Modalidade'); ?></th>
                    <th width='10%'<?php echo $this->Paginator->sort('Status'); ?></th>

                    <th width="10%" class="actions"><?php echo __('Ações'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matriculas as $matricula): ?>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($matricula['Atleta']['nome'], array('controller' => 'atletas', 'action' => 'view', $matricula['Atleta']['id'])); ?>
                        </td>
                        <td><?php echo h($this->Locale->date($matricula['Matricula']['vencimento'])); ?>&nbsp;</td>
                        <td><?php echo h($this->Number->currency($matricula['Matricula']['valor'], 'Br')); ?>&nbsp;</td>

                        <td>
                            <?php echo $this->Html->link($matricula['Modalidade']['nome'], array('controller' => 'modalidades', 'action' => 'view', $matricula['Modalidades']['id'])); ?>
                        </td>
                        <td><?php
                            $status = true;
                            if ($matricula['Matricula']['status'] == 1) {
                                echo "<b class='text-success'>Ativo</span>";
                            } elseif ($matricula['Matricula']['status'] == 0) {
                                echo "<b class='text-error'>Inativo</span>";
                                $status = false;
                            }
                            ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__(), array('action' => 'view', $matricula['Matricula']['id']), array('class' => 'isb-zoom', 'title' => 'Visualizar')); ?>
                            <?php echo $this->Html->link(__(), array('action' => 'edit', $matricula['Matricula']['id']), array('class' => 'isb-edit', 'title' => 'Editar')); ?>
                            
                            <?php 
                            
                            if($status){                            
                            echo $this->Form->postLink(__(), array('action' => 'desabilita', $matricula['Matricula']['id']), array('class' => 'isb-cancel', 'title' => 'Desabilitar'), __('Você deseja excluir o registro # %s?', $matricula['Matricula']['id'])); 
                            }else{
                            echo $this->Form->postLink(__(), array('action' => 'ativar', $matricula['Matricula']['id']), array('class' => 'isb-power', 'title' => 'Ativar'));     
                            }
                            ?>
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
