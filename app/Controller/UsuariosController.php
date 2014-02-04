<?php

App::uses('AppController', 'Controller');

/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
class UsuariosController extends AppController {

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
        $this->Usuario->recursive = 0;
        $this->set('usuarios', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException('Usuário inválido.', 'erro');
        }
        $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
        $this->set('usuario', $this->Usuario->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash('Usuários salvo com sucesso', 'sucesso');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Usuário não pode ser salvo. Por favor, tente novamente!', 'erro');
            }
        }
        $perfils = $this->Usuario->Perfil->find('list');
        $this->set(compact('perfils'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException('Usuário inválido.', 'erro');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            if(!empty($this->request->data['Usuario']['senha2'])){
                if($this->request->data['Usuario']['senha2'] == $this->request->data['Usuario']['confirma_senha2']){
                    
                    $this->request->data['Usuario']['senha'] = $this->request->data['Usuario']['senha2'];               
                }else{
                    $this->Session->setFlash('Senhas não conferem.',  'alerta');
                    return false;
                }
                
            }
            
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash('Usuários salvo com sucesso', 'sucesso');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Usuário não pode ser salvo. Por favor, tente novamente!', 'erro');
            }
        } else {
            $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
            $this->request->data = $this->Usuario->find('first', $options);
            $this->set('usuario', $this->request->data);
        }
        $perfils = $this->Usuario->Perfil->find('list');
        $this->set(compact('perfils'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException('Usuário inválido.', 'erro');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Usuario->delete()) {
            $this->Session->setFlash('Usuários deletado com sucesso', 'sucesso');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Usuário não pode ser deletado. Por favor, tente novamente!', 'erro');
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {
        $this->layout = 'limpo';

        if ($this->request->is('POST')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}
