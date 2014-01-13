<?php
App::uses('AppController', 'Controller');
/**
 * Faixas Controller
 *
 * @property Faixa $Faixa
 */
class FaixasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Faixa->recursive = 0;
		$this->set('faixas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Faixa->exists($id)) {
			throw new NotFoundException(__('Invalid faixa'));
		}
		$options = array('conditions' => array('Faixa.' . $this->Faixa->primaryKey => $id));
		$this->set('faixa', $this->Faixa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Faixa->create();
			if ($this->Faixa->save($this->request->data)) {
				$this->Session->setFlash(__('Faixa salva com sucesso!'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Faixa não pode ser salvo. Por favor, tente novamente.'), 'erro');
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
		if (!$this->Faixa->exists($id)) {
			throw new NotFoundException(__('Invalid faixa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Faixa->save($this->request->data)) {
				$this->Session->setFlash(__('Faixa salva com sucesso!'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Faixa não pode ser salvo. Por favor, tente novamente.'), 'erro');
			}
		} else {
			$options = array('conditions' => array('Faixa.' . $this->Faixa->primaryKey => $id));
			$this->request->data = $this->Faixa->find('first', $options);
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
		$this->Faixa->id = $id;
		if (!$this->Faixa->exists()) {
			throw new NotFoundException(__('Invalid faixa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Faixa->delete()) {
			$this->Session->setFlash(__('Faixa deletada com sucesso!'), 'sucesso');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Faixa não pode ser deletada. Por favor, tente novamente.'), 'erro');
		$this->redirect(array('action' => 'index'));
	}
}
