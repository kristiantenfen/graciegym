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

<div class="span12">
    <div class="head clearfix">
        <div class="isw-documents"></div>
        <h1><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>
    </div>
    <div class="block-fluid">                        
        <?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; 
        
        foreach ($fields as $field) {
            
            if (strpos($action, 'add') !== false && $field == $primaryKey) {
                continue;
            } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                
                echo " <div class='row-form clearfix'> 
                        <div class='span3'>{$field}</div>
                        <?php \t\techo \$this->Form->input('{$field}',array('label' => false, 'div' => array('class' => 'span9') ));\n ?> 
                       </div>";
                
            }
        }
        if (!empty($associations['hasAndBelongsToMany'])) {
            foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                echo "\t\techo \$this->Form->input('{$assocName}');\n";
            }
        }
        ?>
<?php
echo "<?php echo \$this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>\n";
?>

    </div>
</div>







