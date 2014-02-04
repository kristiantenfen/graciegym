<?php
App::uses('AppController', 'Controller');
/**
 * Perfils Controller
 *
 * @property Perfil $Perfil
 * @property PaginatorComponent $Paginator
 */
class PerfilsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Perfil->recursive = 0;
		$this->set('perfils', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
		$this->set('perfil', $this->Perfil->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Perfil->create();
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('The perfil has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perfil could not be saved. Please, try again.'));
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
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('The perfil has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perfil could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
			$this->request->data = $this->Perfil->find('first', $options);
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
		$this->Perfil->id = $id;
		if (!$this->Perfil->exists()) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Perfil->delete()) {
			$this->Session->setFlash(__('Perfil deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Perfil was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
