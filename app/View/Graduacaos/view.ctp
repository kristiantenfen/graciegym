
<div class="span6">                    

    <div class="block-fluid ucard clearfix">


        <div class="info">                                                                
            <ul class="rows">
                <li class="heading"><?php  echo __('Graduacao'); ?></li>

                                    
                <li>
                    		 <div class='title'><?php echo __('Atletas'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($graduacao['Atleta']['nome'], array('controller' => 'atletas', 'action' => 'view', $graduacao['Atletas']['id'])); ?>
			&nbsp;
		</div>
                </li>

                <li>
                    		 <div class='title'><?php echo __('Faixa'); ?></div>
		 <div class='text'>
			<?php echo $this->Html->link($graduacao['Faixa']['cor'], array('controller' => 'faixas', 'action' => 'view', $graduacao['Faixas']['id'])); ?>
			&nbsp;
		</div>
                </li>
                
                                 
                <li>
                    		<div class='title'><?php echo __('Inicio'); ?></div>
		 <div class='text'>
			<?php echo h($this->Locale->date($graduacao['Graduacao']['inicio'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                                 
               
                                 
                <li>
                    		<div class='title'><?php echo __('Fim'); ?></div>
		 <div class='text'>
			<?php echo h($this->Locale->date($graduacao['Graduacao']['fim'])); ?>
			&nbsp;
		</div>
                </li>
                                 
                
                                 
                
                                 
                <li>
                    		<div class='title'><?php echo __('Graus'); ?></div>
		 <div class='text'>
			<?php echo h($graduacao['Graduacao']['graus']); ?>
			&nbsp;
		</div>
                </li>
                                 
                

                                                       
            </ul>                                                      
        </div>                        

    </div>
</div> 






