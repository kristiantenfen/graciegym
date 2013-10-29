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
                        )
                    
               
               )
                );
            

            // Define conditions
            $this->FilterResults->setPaginate('conditions', $this->FilterResults->getConditions());
		$this->Matricula->recursive = 0;
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
			throw new NotFoundException(__('Invalid matricula'));
		}
		$options = array('conditions' => array('Matricula.' . $this->Matricula->primaryKey => $id));
		$matricula = $this->Matricula->find('first', $options);
              //  var_dump($matricula);
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
                                $this->Mensalidade->gerar($this->Matricula->getInsertID());
				$this->Session->setFlash(__('The matricula has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matricula could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid matricula'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Matricula->save($this->request->data)) {
				$this->Session->setFlash(__('The matricula has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matricula could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Matricula.' . $this->Matricula->primaryKey => $id));
			$this->request->data = $this->Matricula->find('first', $options);
                        
		}
                $this->set('matricula', $this->request->data);
		$atletas = $this->Matricula->Atleta->find('list');
		$modalidades = $this->Matricula->Modalidade->find('list' , array('fields' => array('id', 'nome')));
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
			throw new NotFoundException(__('Invalid matricula'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Matricula->delete()) {
			$this->Session->setFlash(__('Matricula deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Matricula was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
