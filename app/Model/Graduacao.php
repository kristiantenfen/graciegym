<?php
App::uses('AppModel', 'Model');
/**
 * Graduacao Model
 *
 * @property Atletas $Atletas
 * @property Faixas $Faixas
 */
class Graduacao extends AppModel {
    
    public $recursive = 2;

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'graduacao';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'atletas_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'faixas_id' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Atleta' => array(
			'className' => 'Atletas',
			'foreignKey' => 'atletas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Faixa' => array(
			'className' => 'Faixas',
			'foreignKey' => 'faixas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
