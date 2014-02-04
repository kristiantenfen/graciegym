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
    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array('username' => 'email', 'password' => 'senha')
                )
            ),
            'authError' => 'Área Restrita! Efetue login!',
            'loginError' => 'Nome de usuário ou senha não conferem!',
            'logoutRedirect' => array('action' => 'login', 'controller' => 'usuarios'),
            'loginRedirect' => array('controller' => '/'),
            'loginAction' => array('controller' => 'usuarios', 'action' => 'login')
        ),
        'RequestHandler', 'Session',
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
    


        public function deleteFile($file) {
            $this->autoRender = false;
            if ($this->request->is('delete')) {
                $_GET['file'] = $file;
                $this->Upload->deleteFile(array('image_versions' => array('' => array(), 'medium' => array(), 'thumbnail' => array())));
            }
        }


        public function upload() {
            $this->autoRender = false;
            $this->Upload->uploadFile(array(
                'image_versions' => array(
                    '' => array(
                        'max_width' => 500,
                        'max_height' => 375,
                        'jpeg_quality' => 95
                    ),
                    'medium' => array(
                        'max_width' => 160,
                        'max_height' => 160,
                        'jpeg_quality' => 80
                    ),
                    'thumbnail' => array(
                        'max_width' => 100,
                        'max_height' => 100
                    )
                )
            ));
        }

    public function beforeFilter() {
        parent::beforeFilter();
//        $this->Auth->allow('add', 'login', 'logout');
        $this->Auth->allow('*');
        
        $this->set('baseUrl', 'graciegym');
        $this->set('usuarioLogado', $this->Auth->user());

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
