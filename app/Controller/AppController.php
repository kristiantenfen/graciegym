<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('NumberHelper', 'View/Helper');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array('Locale.Locale', 'CakePtbr.Formatacao', 'FilterResults.FilterForm' => array(
            'operators' => array(
                'LIKE' => 'containing',
                'NOT LIKE' => 'not containing',
                'LIKE BEGIN' => 'starting with',
                'LIKE END' => 'ending with',
                '=' => 'equal to',
                '!=' => 'different',
                '>' => 'greater than',
                '>=' => 'greater or equal to',
                '<' => 'less than',
                '<=' => 'less or equal to'
            )
    ));
    public $components = array('Session',
        'FilterResults.FilterResults' => array(
            'auto' => array(
                'paginate' => false,
                'explode' => true, // recommended
            ),
            'explode' => array(
                'character' => ' ',
                'concatenate' => 'AND',
            )
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();


        $this->set('baseUrl', 'graciegym');

        /**
         * Cria padrão de formato brasileiro para moeda
         * Necessário incluir App::uses('NumberHelper', 'View/Helper');
         */
        $Number = new NumberHelper(new View(null));
        $Number->addFormat('Br', array(
            'wholeSymbol' => 'R$ ',
            'wholePosition' => 'before',
            'fractionSymbol' => false,
            'fractionPosition' => 'after',
            'zero' => false,
            'places' => 2,
            'thousands' => '.',
            'decimals' => ',',
            'negative' => '()',
            'escape' => true
        ));
        $Number->addFormat('Br2', array(
            'wholeSymbol' => false,
            'wholePosition' => 'before',
            'fractionSymbol' => false,
            'fractionPosition' => 'after',
            'zero' => false,
            'places' => 2,
            'thousands' => '.',
            'decimals' => ',',
            'negative' => '()',
            'escape' => true
                )
        );
    }

}
