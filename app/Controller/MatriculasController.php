<?php

App::uses('AppController', 'Controller');

/**
 * Matriculas Controller
 *
 * @property Matricula $Matricula
 */
class MatriculasController extends AppController {

    public $uses = array('Matricula', 'Mensalidade', 'Modalidade');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->FilterResults->addFilters(array(
            'modalidade' => array(
                'Matricula.modalidades_id' => array(
                    'operator' => '=',
                    'select' => array(null => 'Todos', $this->Modalidade->find('list'))
                )
            ),
            'atleta' => array(
                'Atleta.nome' => array(
                    'operator' => 'LIKE',
                    'value' => array(
                        'before' => '%', // opcional
                        'after' => '%'  // opcional
                    )
                )
            ),
            'status' => array(
                'Matricula.status' => array(
                    'operator' => '=',
                    'select' => array(1 => 'Ativo', 0 => 'Inativo')
                )
            )
                )
        );


        // Define conditions
        $this->FilterResults->setPaginate('conditions', $this->FilterResults->getConditions());
        $this->Matricula->recursive = 2;
        $this->set('matriculas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Matricula->exists($id)) {
            throw new NotFoundException(__('Matricula inválida'), 'info');
        }

        $options = array('conditions' => array('Matricula.' . $this->Matricula->primaryKey => $id));
        $matricula = $this->Matricula->find('first', $options);
        $this->set('matricula', $matricula);
        $this->set('mensalidades', $this->Mensalidade->find('all', array('conditions' => array('Mensalidade.matriculas_id' => $id))));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $this->Matricula->create();
            if ($this->Matricula->save($this->request->data)) {

                $dataPrimeiraParcela = explode("/", $this->request->data['Matricula']['vencimento']);
                $dia = $dataPrimeiraParcela[0];
                $mes = $dataPrimeiraParcela[1];
                $ano = $dataPrimeiraParcela[2];

                $this->Mensalidade->gerar($this->Matricula->getInsertID(), $ano.'-'.$mes.'-'.$dia);
                $this->Session->setFlash(__('Matrícula salva com sucesso'), 'sucesso');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Matrícula não pode ser salva. Por favor, tente novamente'), 'erro');
            }
        }
        $atletas = $this->Matricula->Atleta->find('list');
        $modalidades = $this->Matricula->Modalidade->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('atletas', 'modalidades'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Matricula->exists($id)) {
            throw new NotFoundException(__('Matrícula inválida'), 'info');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $Matricula = $this->Matricula->save($this->request->data);
            if ($Matricula) {
                $this->Mensalidade->atualiza($Matricula, $this->request->data);
                $this->Session->setFlash(__('Matrícula salva com sucesso.'), 'sucesso');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Matrícula não pode ser salva. Por favor, tente novamente'), 'erro');
            }
        } else {
            $options = array('conditions' => array('Matricula.' . $this->Matricula->primaryKey => $id));
            $this->request->data = $this->Matricula->find('first', $options);
        }
        $this->set('matricula', $this->request->data);
        $atletas = $this->Matricula->Atleta->find('list');
        $modalidades = $this->Matricula->Modalidade->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('atletas', 'modalidades'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Matricula->id = $id;
        if (!$this->Matricula->exists()) {
            throw new NotFoundException(__('Matrícula inválida.'), 'info');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Matricula->delete()) {
            $this->Session->setFlash(__('Matricula deletada com sucesso'), 'sucesso');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Matricula não pode ser deletada'), 'erro');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * desabilita method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function desabilita($id = null) {
        $this->Matricula->id = $id;
        if (!$this->Matricula->exists()) {
            throw new NotFoundException(__('Matrícula inválida.'), 'info');
        }
        $this->request->onlyAllow('post', 'delete');
        $Matricula = array();
        $Matricula['Matricula']['status'] = 2;
        $Matricula['Matricula']['id'] = $id;

//                var_dump($this->Matricula);die;
        if ($this->Matricula->updateAll(array('status' => '0'), array('Matricula.id' => $id))) {
            $this->Mensalidade->deleteAll(array('Mensalidade.matriculas_id' => $id, 'Mensalidade.status' => '0'));
            $this->Session->setFlash(__('Matricula desativada com sucesso'), 'sucesso');
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Matricula não pode ser desativada'), 'erro');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * ativar method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function ativar($id = null) {
        $this->Matricula->id = $id;
        if (!$this->Matricula->exists()) {
            throw new NotFoundException(__('Matrícula inválida.'), 'info');
        }
        $this->request->onlyAllow('post', 'delete');
        
        if ($this->Matricula->updateAll(array('status' => '1'), array('Matricula.id' => $id))) {
            $this->Session->setFlash(__('Matricula ativada com sucesso'), 'sucesso');
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Matricula não pode ser ativada. Por favor, tente novamente!'), 'erro');
        $this->redirect(array('action' => 'index'));
    }

}
