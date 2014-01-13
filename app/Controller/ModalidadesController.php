<?php
App::uses('AppController', 'Controller');
/**
 * Modalidades Controller
 *
 * @property Modalidade $Modalidade
 */
class ModalidadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Modalidade->recursive = 0;
		$this->set('modalidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modalidade->exists($id)) {
			throw new NotFoundException(__('Invalid modalidade'));
		}
		$options = array('conditions' => array('Modalidade.' . $this->Modalidade->primaryKey => $id));
		$this->set('modalidade', $this->Modalidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modalidade->create();
			if ($this->Modalidade->save($this->request->data)) {
				$this->Session->setFlash(__('Modalidade salva com sucesso'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Modalidade não pode ser salva. Por favor, tente novamente.'), 'erro');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Modalidade->exists($id)) {
			throw new NotFoundException(__('Invalid modalidade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Modalidade->save($this->request->data)) {
				$this->Session->setFlash(__('Modalidade salva com sucesso'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Modalidade não pode ser salva. Por favor, tente novamente.'), 'erro');
			}
		} else {
			$options = array('conditions' => array('Modalidade.' . $this->Modalidade->primaryKey => $id));
			$this->request->data = $this->Modalidade->find('first', $options);
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
		$this->Modalidade->id = $id;
		if (!$this->Modalidade->exists()) {
			throw new NotFoundException(__('Invalid modalidade'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Modalidade->delete()) {
			$this->Session->setFlash(__('Modalidade deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Modalidade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
