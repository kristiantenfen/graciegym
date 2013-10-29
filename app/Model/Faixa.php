<?php
App::uses('AppModel', 'Model');
/**
 * Faixa Model
 *
 */
class Faixa extends AppModel {

    
    public $recursive = 2;
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cor';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cor' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
