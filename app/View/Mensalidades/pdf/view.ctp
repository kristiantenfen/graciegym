
<div class="span6">                    

    <div class="block-fluid ucard clearfix">


        <div class="info">                                                                
            <ul class="rows">
                <li class="heading"><?php  echo __('Mensalidade'); ?></li>

                                    
                <li>
                    		<div class='title'><?php echo __('Id'); ?></div>
		 <div class='text'>
			<?php echo h($mensalidade['Mensalidade']['id']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Status'); ?></div>
		 <div class='text'>
			<?php echo h($mensalidade['Mensalidade']['status']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		 <div class''title><?php echo __('Matriculas'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($mensalidade['Matriculas']['id'], array('controller' => 'matriculas', 'action' => 'view', $mensalidade['Matriculas']['id'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Created'); ?></div>
		 <div class='text'>
			<?php echo h($mensalidade['Mensalidade']['created']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Modified'); ?></div>
		 <div class='text'>
			<?php echo h($mensalidade['Mensalidade']['modified']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Valor Pago'); ?></div>
		 <div class='text'>
			<?php echo h($mensalidade['Mensalidade']['valor_pago']); ?>
			&nbsp;
		</div>
                </li>
                                 
                <li>
                    		<div class='title'><?php echo __('Vencimento'); ?></div>
		 <div class='text'>
			<?php echo h($mensalidade['Mensalidade']['vencimento']); ?>
			&nbsp;
		</div>
                </li>
             

                                                       
            </ul>                                                      
        </div>                        

    </div>
</div> 






