<?php
App::uses('AppModel', 'Model');
/**
 * Graduaco Model
 *
 * @property Faixas $Faixas
 * @property Atletas $Atletas
 */
class Graduaco extends AppModel {
    
    public $recursive = 2;

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'graduacoes';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'graus';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'faixas_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'atletas_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'inicio' => array(
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
		'Faixa' => array(
			'className' => 'Faixas',
			'foreignKey' => 'faixas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Atleta' => array(
			'className' => 'Atletas',
			'foreignKey' => 'atletas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
