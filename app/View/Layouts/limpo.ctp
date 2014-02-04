<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('Gracie Gym', 'Gracie Gym: Jiu-Jitsu Defesa pessoal');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
    
    
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
    
    <!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>-->
    <!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script>-->
   
	<?php
        

                
        
                echo $this->Html->script('admin/plugins/fancybox/jquery.fancybox.pack');
                echo $this->Html->script('admin/plugins/dataTables/jquery.dataTables.min');
                echo $this->Html->script('admin/plugins/cleditor/jquery.cleditor');
                echo $this->Html->script('admin/plugins/qtip/jquery.qtip-1.0.0-rc3.min');
                echo $this->Html->script('admin/plugins/animatedprogressbar/animated_progressbar');
                echo $this->Html->script('admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min');
                echo $this->Html->script('admin/plugins/validation/jquery.validationEngine');
                echo $this->Html->script('admin/plugins/validation/languages/jquery.validationEngine-en');
                echo $this->Html->script('admin/plugins/maskedinput/jquery.maskedinput-1.3.min');
                echo $this->Html->script('admin/plugins/uniform/uniform');
                echo $this->Html->script('admin/plugins/select2/select2.min');
                echo $this->Html->script('admin/plugins/sparklines/jquery.sparkline.min');
                echo $this->Html->script('admin/plugins/charts/jquery.flot.resize');
                echo $this->Html->script('admin/plugins/charts/jquery.flot.pie');
                echo $this->Html->script('admin/plugins/charts/jquery.flot.stack');
                echo $this->Html->script('admin/plugins/charts/excanvas.min');
                echo $this->Html->script('admin/plugins/charts/jquery.flot');
                echo $this->Html->script('admin/plugins/jquery/jquery.mousewheel.min');
                echo $this->Html->script('admin/plugins/cookie/jquery.cookies.2.2.0.min');

                
                echo $this->Html->css('admin/fullcalendar.print');
                echo $this->Html->css('padrao');
                echo $this->Html->css('admin/stylesheets');
                echo $this->Html->css('ui/jquery-ui-1.10.3.custom.min');
		echo $this->Html->meta('icon');

		
                echo $this->Html->css('admin/stylesheet');
                
                echo $this->Html->script('jquery');
                echo $this->Html->script('admin/plugins/bootstrap.min');
                echo $this->Html->script('admin/plugins');
                echo $this->Html->script('mask');
                echo $this->Html->script('admin/plugins/fullcalendar/fullcalendar.min');
                echo $this->Html->script('buscaUser');
                echo $this->Html->script('jquery.maskmoney');
                echo $this->Html->script('ui/jquery-ui-1.10.3.custom.min');
                echo $this->Html->script('padrao');
                echo $this->Html->script('pagamento');
                
                

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <script type="text/javascript"> var baseUrl = '<?php echo $baseUrl;?>';</script>
    
			<?php echo $this->Session->flash(); ?>


			<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
