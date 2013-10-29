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
        

                
//        
//                echo $this->Html->script('admin/plugins/fancybox/jquery.fancybox.pack');
//                echo $this->Html->script('admin/plugins/dataTables/jquery.dataTables.min');
//                echo $this->Html->script('admin/plugins/cleditor/jquery.cleditor');
//                echo $this->Html->script('admin/plugins/qtip/jquery.qtip-1.0.0-rc3.min');
//                echo $this->Html->script('admin/plugins/animatedprogressbar/animated_progressbar');
//                echo $this->Html->script('admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min');
//                echo $this->Html->script('admin/plugins/validation/jquery.validationEngine');
//                echo $this->Html->script('admin/plugins/validation/languages/jquery.validationEngine-en');
//                echo $this->Html->script('admin/plugins/maskedinput/jquery.maskedinput-1.3.min');
//                echo $this->Html->script('admin/plugins/uniform/uniform');
//                echo $this->Html->script('admin/plugins/select2/select2.min');
//                echo $this->Html->script('admin/plugins/sparklines/jquery.sparkline.min');
//                echo $this->Html->script('admin/plugins/charts/jquery.flot.resize');
//                echo $this->Html->script('admin/plugins/charts/jquery.flot.pie');
//                echo $this->Html->script('admin/plugins/charts/jquery.flot.stack');
//                echo $this->Html->script('admin/plugins/charts/excanvas.min');
//                echo $this->Html->script('admin/plugins/charts/jquery.flot');
//                echo $this->Html->script('admin/plugins/jquery/jquery.mousewheel.min');
//                echo $this->Html->script('admin/plugins/cookie/jquery.cookies.2.2.0.min');

                
                echo $this->Html->css('admin/fullcalendar.print');
                echo $this->Html->css('padrao');
                echo $this->Html->css('admin/stylesheets');
                echo $this->Html->css('ui/jquery-ui-1.10.3.custom.min');
		echo $this->Html->meta('icon');

		
//                echo $this->Html->css('admin/stylesheet');
                
                echo $this->Html->script('jquery');
                echo $this->Html->script('admin/plugins/bootstrap.min');
//                echo $this->Html->script('admin/plugins');
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
    <div class="header">

    </div>
    
    <div class="menu">                
        
<!--       <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, Aqvatarius
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><span class="icon-comment"></span> <a href="messages.html">Messages</a> <a href="messages.html" class="caption red">12</a></li>
                <li><span class="icon-cog"></span> <a href="forms.html">Settings</a></li>
                <li><span class="icon-share-alt"></span> <a href="login.html">Logout</a></li>
            </ul>
            <div class="info">
                <span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
            </div>
        </div>-->
        
        <ul class="navigation">  
            <li class="active">
                <a href="<?php echo $this->Html->url('/', true)?>">
                    <span class="isw-grid"></span><span class="text">Início</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo $this->Html->url('/atletas', true)?>">
                    <span class="isw-grid"></span><span class="text">Atetlas</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo $this->Html->url('/graduacaos', true)?>">
                    <span class="isw-grid"></span><span class="text">Graduação</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo $this->Html->url('/faixas', true)?>">
                    <span class="isw-grid"></span><span class="text">Faixas</span>
                </a>
            </li>
            
             <li class="active">
                <a href="<?php echo $this->Html->url('/matriculas', true)?>">
                    <span class="isw-grid"></span><span class="text">Matrículas</span>
                </a>
            </li>
             <li class="active">
                <a href="<?php echo $this->Html->url('/modalidades', true)?>">
                    <span class="isw-grid"></span><span class="text">Modalidades</span>
                </a>
            </li>
<!--             <li class="active">
                <a href="<?php echo $this->Html->url('/mensalidades', true)?>">
                    <span class="isw-grid"></span><span class="text">Mesalidades</span>
                </a>
            </li>-->
          <!--  <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">UI elements</span>
                </a>
                <ul>
                    <li>
                        <a href="ui.html">
                            <span class="icon-th"></span><span class="text">UI Elements</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="widgets.html">
                            <span class="icon-th-large"></span><span class="text">Widgets</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="buttons.html">
                            <span class="icon-chevron-right"></span><span class="text">Buttons</span>
                        </a>                  
                    </li> 
                    <li>
                        <a href="icons.html">
                            <span class="icon-fire"></span><span class="text">Icons</span>
                        </a>                  
                    </li>                    
                </ul>                
            </li>          
            <li>
                <a href="forms.html">
                    <span class="isw-archive"></span><span class="text">Forms stuff</span>                 
                </a>
            </li>                        
            <li class="openable">
                <a href="#">
                    <span class="isw-chat"></span><span class="text">Messages</span>
                </a>
                <ul>
                    <li>
                        <a href="messages.html">
                            <span class="icon-comment"></span><span class="text">Messages widgets</span></a>
                            
                            <a href="#" class="caption yellow link_navPopMessages">5</a>

                            <div id="navPopMessages" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Personal messages</span>
                                </div>
                                <div class="body messages">

                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Aqvatarius</a>
                                            <p>Lorem ipsum dolor. In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim.</p>
                                            <span>19 feb 2012 12:45</span>
                                        </div>
                                    </div>

                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/olga.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Olga</a>
                                            <p>Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                            <span>18 feb 2012 12:45</span>
                                        </div>
                                    </div>                        

                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/dmitry.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Dmitry</a>
                                            <p>In id adipiscing diam. Sed lobortis dui ut odio tempor blandit.</p>
                                            <span>17 feb 2012 12:45</span>
                                        </div>
                                    </div>                         

                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/helen.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Helen</a>
                                            <p>Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                            <span>15 feb 2012 12:45</span>
                                        </div>
                                    </div>                                  

                                </div>
                                <div class="footer">
                                    <button class="btn link_navPopMessages" type="button">Close</button>
                                </div>
                            </div>                                                                                                                          
                    </li>                                        
                </ul>                
                
   
            </li>                                    
            <li>
                <a href="statistic.html">
                    <span class="isw-graph"></span><span class="text">Statistics</span>
                </a>
            </li>   
            <li>
                <a href="tables.html">
                    <span class="isw-text_document"></span><span class="text">Tables</span>
                </a>                
            </li>   
            <li class="openable">
                <a href="#">
                    <span class="isw-documents"></span><span class="text">Sample pages</span>
                </a>
                <ul>
                    <li>
                        <a href="user.html">
                            <span class="icon-user"></span><span class="text">User profile</span>
                        </a>                  
                    </li>
                    <li>
                        <a href="users.html">
                            <span class="icon-list"></span><span class="text">Users</span>
                        </a>
                    </li>  
                    <li>
                        <a href="stream.html">
                            <span class="icon-refresh"></span><span class="text">Stream activity</span>
                        </a>
                    </li>    
                    <li>
                        <a href="mail.html">
                            <span class="icon-envelope"></span><span class="text">Mailbox</span>
                        </a>
                    </li>  
                    <li>
                        <a href="edit.html">
                            <span class="icon-pencil"></span><span class="text">User edit</span>
                        </a>                  
                    </li>                                          
                </ul>                                
            </li>            
            <li class="openable">
                <a href="#">
                    <span class="isw-zoom"></span><span class="text">Other</span>                    
                </a>
                <ul>
                    <li>
                        <a href="gallery.html">
                            <span class="icon-picture"></span><span class="text">Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="typography.html">
                            <span class="icon-pencil"></span><span class="text">Typography</span>
                        </a>
                    </li>
                    <li>
                        <a href="files.html">
                            <span class="icon-upload"></span><span class="text">File handling</span>
                        </a>
                    </li>                                                
                </ul>
            </li>  -->
<!--            <li class="openable">
                <a href="#">
                    <span class="isw-cancel"></span><span class="text">Error pages</span>                    
                </a>
                <ul>                    
                    <li><a href="403.html"><span class="icon-warning-sign"></span><span class="text">403 Forbidden</span></a></li>
                    <li><a href="404.html"><span class="icon-warning-sign"></span><span class="text">404 Not Found</span></a></li>
                    <li><a href="500.html"><span class="icon-warning-sign"></span><span class="text">500 Internal Server Error</span></a></li>
                    <li><a href="503.html"><span class="icon-warning-sign"></span><span class="text">503 Service Unavailable</span></a></li>
                    <li><a href="504.html"><span class="icon-warning-sign"></span><span class="text">504 Gateway Timeout</span></a></li>
                </ul>
            </li>                         -->
        </ul>
        
        <div class="dr"><span></span></div>
        
<!--        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>-->
        
        
            
    </div>
    <div class="content">
	<div class="workplace">
			<?php echo $this->Session->flash(); ?>
<!--		<div id="header">
		</div>-->
            
            <!--  CONTEUDO  -->
		<div class="row-fluid">


			<?php echo $this->fetch('content'); ?>
		</div>
            
            <!-- FIM DO CONTEUDO -->
            
<!--		<div id="footer">
			
		</div>-->
	</div>
    </div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
