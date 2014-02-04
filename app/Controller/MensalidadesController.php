<?php

App::uses('AppController', 'Controller');

/**
 * Mensalidades Controller
 *
 * @property Mensalidade $Mensalidade
 */
class MensalidadesController extends AppController {

    public $uses = array('Mensalidade', 'Matricula', 'Modalidade');
    public $paginate = array('limit' => 100000);

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $this->Mensalidade->bindModel(array(
            'belongsTo' => array(
                'Matricula' => array('foreignKey' => false,
                    'type' => 'LEFT',
                    'conditions' => array('Mensalidade.matriculas_id = Matricula.id')
                )
            ),
            'Modalidade' => array('foreignKey' => false,
                'type' => 'LEFT',
                'conditions' => array('Modalidade.id = Matricula.modalidades_id')
            ),
            false
        ));



        $this->FilterResults->addFilters(array(
            'status' => array(
                'Mensalidade.status' => array(
                    'select' => array(null => 'Todos', 1 => 'Pago', 0 => 'Pendente', 2 => 'Anulada'),
                )
            ),
            'modalidades' => array(
                'Matricula.modalidades_id' => array(
                    'select' => array(null => 'Todos', $this->Modalidade->find('list')),
                )
            ),
            'vencimento' => array(
                'Mensalidade.vencimento' => array(
                    'operator' => 'BETWEEN',
                    'between' => array(
                        'text' => __(' e ', true),
                        'date' => true
                    )
                )
            ),
            'pagamento' => array(
                'Mensalidade.data_pagamento' => array(
                    'operator' => 'BETWEEN',
                    'between' => array(
                        'text' => __(' e ', true),
                        'date' => true
                    )
                )
            )
                )
        );

        $this->FilterResults->setPaginate('conditions', $this->FilterResults->getConditions());

        $this->Mensalidade->recursive = 2;


        $this->set('mensalidades', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {


        $params = array(
            'download' => true,
            'name' => 'example.pdf',
            'paperOrientation' => 'portrait',
            'paperSize' => 'legal'
        );
        $this->set($params);

        if (!$this->Mensalidade->exists($id)) {
            throw new NotFoundException(__('Mensalidade'));
        }
        $options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
        $this->set('mensalidade', $this->Mensalidade->find('first', $options));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Mensalidade->exists($id)) {
            throw new NotFoundException(__('Invalid mensalidade'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Mensalidade->save($this->request->data)) {
                $this->Session->setFlash(__('Mensalidade salva com sucesso.'), 'sucesso');
                $this->redirect(array('controller' => 'matriculas', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Mensalidade não pode ser salva. Por favor, tente novamente'), 'erro');
            }
        } else {
            $options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
            $this->request->data = $this->Mensalidade->find('first', $options);
        }
        $this->set('mensalidade', $this->request->data);
        $matriculas = $this->Mensalidade->Matricula->find('list');
        $this->set(compact('matriculas'));
    }

    public function gerar($id = null) {

        if (!$this->Matricula->exists($id)) {
            $this->Session->setFlash(__('Matrícula inválida!'), 'erro');
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            $mensalidade = $this->Mensalidade->find('first', array('conditions' => array('Mensalidade.matriculas_id' => $id, 'Mensalidade.status' => 0), 'order' => array('Mensalidade.id DESC')));
            if (isset($mensalidade['Mensalidade']['id'])) {

                $dataPrimeiraParcela = explode("-", $mensalidade['Mensalidade']['vencimento']);
                $dia = $dataPrimeiraParcela[2];
                $mes = $dataPrimeiraParcela[1];
                $ano = $dataPrimeiraParcela[0];
                $dataInicio = date("Y-m-d", strtotime("+1 month", mktime(0, 0, 0, $mes, $dia, $ano)));
            } else {
                $dataInicio = date("Y-m-d");
            }


            if ($this->Mensalidade->gerar($id, $dataInicio)) {

                $this->Matricula->updateAll(array('status' => '1'), array('Matricula.id' => $id));

                $this->Session->setFlash(__('Mensalidades geradas com sucesso!'), 'sucesso');
                $this->redirect(array('controller' => 'matriculas', 'action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('Mensalidades não foram geradas. Por favor, tente novamente!'), 'erro');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function pagar() {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $idMensalidade = $this->request->data['idMensalidade'];
            if ($idMensalidade) {

                $mensalidade = $this->Mensalidade->find('first', array('conditions' => array('Mensalidade.id' => $idMensalidade)));

                $mensalidade['Mensalidade']['id'] = $idMensalidade;
                $mensalidade['Mensalidade']['valor_pago'] = $mensalidade['Matricula']['valor'];
                $mensalidade['Mensalidade']['data_pagamento'] = date('Y-m-d');
                $mensalidade['Mensalidade']['status'] = true;
                $mensalidade['Mensalidade']['created'] = $mensalidade['Mensalidade']['created'];
                $mensalidade['Mensalidade']['modified'] = $mensalidade['Mensalidade']['modified'];
                if ($this->Mensalidade->save($mensalidade)) {

                    $countMensalidades = $this->Mensalidade->find('count', array('conditions' => array('Mensalidade.matriculas_id' => $mensalidade['Mensalidade']['matriculas_id'], 'Mensalidade.status' => 0)));
                    if ($countMensalidades < 1) {

                        $dataPrimeiraParcela = explode("-", $mensalidade['Mensalidade']['vencimento']);
                        $dia = $dataPrimeiraParcela[2];
                        $mes = $dataPrimeiraParcela[1];
                        $ano = $dataPrimeiraParcela[0];

                        $this->Mensalidade->gerar($mensalidade['Mensalidade']['matriculas_id'], date("Y-m-d", strtotime("+1 month", mktime(0, 0, 0, $mes, $dia, $ano))));
                    }
                    return $mensalidade;
                } else {
                    return false;
                }
            }
            return false;
        }
    }

    public function anular() {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $idMensalidade = $this->request->data['idMensalidade'];
            if ($idMensalidade) {
                $mensalidade = array();
                $mensalidade['Mensalidade']['id'] = $idMensalidade;
                $mensalidade['Mensalidade']['data_pagamento'] = date('Y-m-d');
                $mensalidade['Mensalidade']['status'] = 2;
                $mensalidade['Mensalidade']['valor_pago'] = '';

                if ($this->Mensalidade->save($mensalidade)) {
                    return $mensalidade;
                } else {
                    return false;
                }
            }
            return false;
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null, $idMatricula = null) {
        $this->Mensalidade->id = $id;
        if (!$this->Mensalidade->exists()) {
            throw new NotFoundException(__('Invalid mensalidade'));
        }
        $this->request->onlyAllow('post', 'delete', 'get');
        if ($this->Mensalidade->delete()) {
            $this->Session->setFlash('Mensalidade deletada', 'sucesso');

            if ($idMatricula) {
                $this->redirect(array('controller' => 'matriculas', 'action' => 'view', $idMatricula));
            }

            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Mensalidade não pode ser deletada. Por favor, tente novamente.', 'erro');

        if ($idMatricula) {
            $this->redirect(array('controller' => 'matriculas', 'action' => 'view', $idMatricula));
        }

        $this->redirect(array('action' => 'index'));
    }

}
