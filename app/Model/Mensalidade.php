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
    public function gerar($idMatricula = null, $dataInicio = null) {

        if ($idMatricula) {

            $mensalidade = array();
            $atleta = $this->Matricula->find('first', array('conditions' => array('Matricula.id' => $idMatricula)));

            $mensalidade['Mensalidade']['atletas_id'] = $atleta['Matricula']['atletas_id'];
            $mensalidade['Mensalidade']['matriculas_id'] = $idMatricula;

            $dataPrimeiraParcela = explode("-", $dataInicio);
            $dia = $dataPrimeiraParcela[2];
            $mes = $dataPrimeiraParcela[1];
            $ano = $dataPrimeiraParcela[0];

            $x = 6;
            for ($i = 0; $i < $x; $i++) {
                $mensalidade['Mensalidade']['id'] = null;
                $mensalidade['Mensalidade']['vencimento'] = date("Y-m-d", strtotime("+" . $i . " month", mktime(0, 0, 0, $mes, $dia, $ano)));

                if ($this->save($mensalidade)) {
                    
                } else {
                    return false;
                }
            }

            return true;
        }
    }

    public function atualiza($Matricula, $dados) {
        $conditions = array('Mensalidade.matriculas_id' => $Matricula['Matricula']['id'], 'Mensalidade.status' => 0);
        $mensalidades = $this->find('all', array('conditions' => $conditions));

        $mesIncrementa = 0;
        foreach ($mensalidades as $mensalidade) {

            $dataPrimeiraParcela = explode("-", $Matricula['Matricula']['vencimento']);
            $dia = $dataPrimeiraParcela[2];
            $mes = $dataPrimeiraParcela[1];
            $ano = $dataPrimeiraParcela[0];




            $mensalidade['Mensalidade']['vencimento'] = date("Y-m-d", strtotime("+" . $mesIncrementa . " month", mktime(0, 0, 0, $mes, $dia, $ano)));
            $mesIncrementa +=1;
            if ($this->save($mensalidade)) {
                
            }
        }
    }

}
