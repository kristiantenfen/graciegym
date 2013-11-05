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
        if (!$this->Mensalidade->exists($id)) {
            throw new NotFoundException(__('Invalid mensalidade'));
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
                $this->Session->setFlash(__('The mensalidade has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The mensalidade could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
            $this->request->data = $this->Mensalidade->find('first', $options);
        }
        $matriculas = $this->Mensalidade->Matricula->find('list');
        $this->set(compact('matriculas'));
    }

    public function pagar() {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $idMensalidade = $this->request->data['idMensalidade'];
//                    $idMensalidade = 30;
            if ($idMensalidade) {

                $mensalidade = $this->Mensalidade->find('first', array('conditions' => array('Mensalidade.id' => $idMensalidade)));

                $mensalidade['Mensalidade']['id'] = $idMensalidade;
                $mensalidade['Mensalidade']['valor_pago'] = $mensalidade['Matricula']['valor'];
                $mensalidade['Mensalidade']['data_pagamento'] = date('Y-m-d');
                $mensalidade['Mensalidade']['status'] = true;
                $mensalidade['Mensalidade']['created'] = $mensalidade['Mensalidade']['created'];
                $mensalidade['Mensalidade']['modified'] = $mensalidade['Mensalidade']['modified'];

//                        var_dump($mensalidade);
                // return false;
                if ($this->Mensalidade->save($mensalidade)) {

                    $countMensalidades = $this->Mensalidade->find('count', array('conditions' => array('Mensalidade.matriculas_id' => $mensalidade['Mensalidade']['matriculas_id'], 'Mensalidade.status' => 0)));
                    if ($countMensalidades < 1) {
                        $this->Mensalidade->gerar($mensalidade['Mensalidade']['matriculas_id'], $mensalidade['Mensalidade']['vencimento']);
//                                die(var_dump($countMensalidades));
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
    public function delete($id = null) {
        $this->Mensalidade->id = $id;
        if (!$this->Mensalidade->exists()) {
            throw new NotFoundException(__('Invalid mensalidade'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Mensalidade->delete()) {
            $this->Session->setFlash(__('Mensalidade deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Mensalidade was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
