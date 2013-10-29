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
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="span6">                    

    <div class="block-fluid ucard clearfix">


        <div class="info">                                                                
            <ul class="rows">
                <li class="heading"><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></li>

                <?php
                foreach ($fields as $field) { ?>
                    
                <li>
                    <?php
                    $isKey = false;
                    if (!empty($associations['belongsTo'])) {
                        foreach ($associations['belongsTo'] as $alias => $details) {
                            if ($field === $details['foreignKey']) {
                                $isKey = true;
                                echo "\t\t <div class''title><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></div>\n";
                                echo "\t\t <div class='text'>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</div>\n";
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) {
                        echo "\t\t<div class='title'><?php echo __('" . Inflector::humanize($field) . "'); ?></div>\n";
                        echo "\t\t <div class='text'>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</div>\n";
                    }
                    ?>
                </li>
             <?php   }
                ?>


                                                       
            </ul>                                                      
        </div>                        

    </div>
</div> 






