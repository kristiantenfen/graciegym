<?php
App::uses('AppController', 'Controller');
/**
 * Graduacos Controller
 *
 * @property Graduaco $Graduaco
 */
class GraduacosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Graduaco->recursive = 0;
		$this->set('graduacos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Graduaco->exists($id)) {
			throw new NotFoundException(__('Invalid graduaco'));
		}
		$options = array('conditions' => array('Graduaco.' . $this->Graduaco->primaryKey => $id));
		$this->set('graduaco', $this->Graduaco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Graduaco->create();
			if ($this->Graduaco->save($this->request->data)) {
				$this->Session->setFlash(__('The graduaco has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The graduaco could not be saved. Please, try again.'));
			}
		}
		$faixas = $this->Graduaco->Faixa->find('list');
		$atletas = $this->Graduaco->Atleta->find('list');
		$this->set(compact('faixas', 'atletas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Graduaco->exists($id)) {
			throw new NotFoundException(__('Invalid graduaco'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Graduaco->save($this->request->data)) {
				$this->Session->setFlash(__('The graduaco has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The graduaco could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Graduaco.' . $this->Graduaco->primaryKey => $id));
			$this->request->data = $this->Graduaco->find('first', $options);
		}
		$faixas = $this->Graduaco->Faixa->find('list');
		$atletas = $this->Graduaco->Atleta->find('list');
		$this->set(compact('faixas', 'atletas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Graduaco->id = $id;
		if (!$this->Graduaco->exists()) {
			throw new NotFoundException(__('Invalid graduaco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Graduaco->delete()) {
			$this->Session->setFlash(__('Graduaco deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Graduaco was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
