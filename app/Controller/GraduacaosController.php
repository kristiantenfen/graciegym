<?php
App::uses('AppController', 'Controller');
/**
 * Graduacaos Controller
 *
 * @property Graduacao $Graduacao
 */
class GraduacaosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->FilterResults->addFilters(array( 
                    'faixa' => array(
                        'Graduacao.faixas_id' => array(
                             'operator' => '=',
                             'select' => array(null => 'Todos', $this->Graduacao->Faixa->find('list', array('fields' => array('id', 'cor'))))
                            )
                        )
                    
               
               )
                );
            

            // Define conditions
            $this->FilterResults->setPaginate('conditions', $this->FilterResults->getConditions());
		$this->Graduacao->recursive = 0;
		$this->set('graduacaos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Graduacao->exists($id)) {
			throw new NotFoundException(__('Graduação inválida'), 'erro');
		}
		$options = array('conditions' => array('Graduacao.' . $this->Graduacao->primaryKey => $id));
		$this->set('graduacao', $this->Graduacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
//                    var_dump($this->request->data);die;
			$this->Graduacao->create();
			if ($this->Graduacao->save($this->request->data)) {
				$this->Session->setFlash(__('Graduação salva com sucesso!'), 'sucesso');
                                
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Graduação não pode ser salva! Por favor, tente novamente'), 'erro');
			}
		}
		$atletas = $this->Graduacao->Atleta->find('list');
		$faixas = $this->Graduacao->Faixa->find('list' , array('fields' => array('id', 'cor')));
		$this->set(compact('atletas', 'faixas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Graduacao->exists($id)) {
			throw new NotFoundException(__('Graduação inválida'), 'erro');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Graduacao->save($this->request->data)) {
				$this->Session->setFlash(__('Graduação salva com sucesso!'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Graduação não pode ser salva! Por favor, tente novamente'), 'erro');
			}
		} else {
			$options = array('conditions' => array('Graduacao.' . $this->Graduacao->primaryKey => $id));
			$this->request->data = $this->Graduacao->find('first', $options);
		}
                $this->set('graduacao', $this->request->data);
		$atletas = $this->Graduacao->Atleta->find('list');
		$faixas = $this->Graduacao->Faixa->find('list' , array('fields' => array('id', 'cor')));
		$this->set(compact('atletas', 'faixas'));
                
                
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Graduacao->id = $id;
		if (!$this->Graduacao->exists()) {
			throw new NotFoundException(__('Graduação inválida'), 'erro');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Graduacao->delete()) {
			$this->Session->setFlash(__('Graduação deletada com sucesso!'), 'sucesso');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Graduação não pode ser deletada'), 'erro');
		$this->redirect(array('action' => 'index'));
	}
}
