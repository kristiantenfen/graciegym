<?php
App::uses('AppModel', 'Model');
/**
 * Mensalidade Model
 *
 * @property Matriculas $Matriculas
 */
class Mensalidade extends AppModel {

    public $recursive = 2;
    
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'matriculas_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Matricula' => array(
			'className' => 'Matriculas',
			'foreignKey' => 'matriculas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        
      
        
        /**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mensalidade->create();
                        $atleta = $this->Matricula->find('first', array('conditions' => array('Matricula.id' => $this->request->data['Mensalidade']['matriculas_id'])));
                        $this->request->data['Mensalidade']['atletas_id'] = $atleta['Atleta']['id'];

			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The mensalidade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensalidade could not be saved. Please, try again.'));
			}
		}
		$matriculas = $this->Mensalidade->Matricula->find('list');
		$this->set(compact('matriculas'));
	}
        
        /**
 * add method
 *
 * @return void
 */
	public function gerar($idMatricula = null, $dataInicio = null) {
            
		if ($idMatricula) {
                    
                    $mensalidade = array();
                        $atleta = $this->Matricula->find('first', array('conditions' => array('Matricula.id' => $idMatricula)));
                      //  var_dump($atleta);
                        
                        $mensalidade['Mensalidade']['atletas_id'] = $atleta['Matricula']['atletas_id'];
                        $mensalidade['Mensalidade']['matriculas_id'] = $idMatricula;
                        
                        if($dataInicio){
                            
                            $dataPrimeiraParcela = explode( "-", $dataInicio);
                            $dia = $dataPrimeiraParcela[2];
                            $mes = $dataPrimeiraParcela[1]+1;
                            $ano = $dataPrimeiraParcela[0];
                        }else{
                            $dataPrimeiraParcela = explode( "-", $atleta['Matricula']['vencimento']);
                            $dia = $dataPrimeiraParcela[2];
                            $mes = $dataPrimeiraParcela[1];
                            $ano = $dataPrimeiraParcela[0];
                            
                        }
                        
                        
                        $x = 6;
                        for ($i =0; $i < $x; $i++){
                            $mensalidade['Mensalidade']['id'] = null;
                            $mensalidade['Mensalidade']['vencimento'] =  date("Y-m-d", strtotime("+".$i." month", mktime(0, 0, 0, $mes, $dia, $ano)));
                            
                        

			if ($this->save($mensalidade)) {
                                
				//$this->Session->setFlash(__('The mensalidade has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
                            die('falha');
				$this->Session->setFlash(__('The mensalidade could not be saved. Please, try again.'));
			}
                        }
		}
		
	}
        
}
