<?php
App::uses('AppController', 'Controller');
/**
 * Atletas Controller
 *
 * @property Atleta $Atleta
 */
class AtletasController extends AppController {
    
    public $uses = array('Atleta', 'Mensalidade', 'Matricula');

/**
 * index method
 *
 * @return void
 */
	public function index() {
             $this->FilterResults->addFilters(array( 
                    'nome' => array(
                        'Atleta.nome' => array(
                             'operator' => 'LIKE',
                                'value' => array(
                                'before' => '%', // opcional
                                'after' => '%' // opcional
                            )
                        )
                    
               
               )
                )
            );

           
             
            // Define conditions
            $this->FilterResults->setPaginate('conditions', $this->FilterResults->getConditions());
		$this->Atleta->recursive = 2;
		$this->set('atletas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Atleta->exists($id)) {
			throw new NotFoundException(__('Invalid atleta'));
		}
		$options = array('conditions' => array('Atleta.' . $this->Atleta->primaryKey => $id));
		$this->set('atleta', $this->Atleta->find('first', $options));
                                        
                $this->Mensalidade->bindModel(array(
                            'belongsTo' => array(
                               'Matricula' => array('foreignKey' => false,
                                                   'type'=> 'LEFT',
                                                   'conditions' => array('Matricula.id = Mensalidade.matriculas_id')
                                               ),
                               ),
                           'belongsTo' => array(
                               'Modalidade' => array('foreignKey' => false,
                                                   'type'=> 'LEFT',
                                                   'conditions' => array('Matricula.modalidades_id = Modalidade.id')
                                               ),

                               ),
                           false
                       ));
                $mensalidades = $this->Mensalidade->find('all', array('conditions' => array('Mensalidade.atletas_id' => $id), 'order' => array('Mensalidade.vencimento ASC')));
                $this->set('mensalidades', $mensalidades);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Atleta->create();
			if ($this->Atleta->save($this->request->data)) {
				$this->Session->setFlash(__('Atleta Salvo com Sucesso!'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Atleta não pode ser salavo. Por favor, tente novamente.'), 'erro');
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
		if (!$this->Atleta->exists($id)) {
			throw new NotFoundException(__('Invalid atleta'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Atleta->save($this->request->data)) {
				$this->Session->setFlash(__('Atleta Salvo com Sucesso!'), 'sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Atleta não pode ser salavo. Por favor, tente novamente.'), 'erro');
			}
		} else {
			$options = array('conditions' => array('Atleta.' . $this->Atleta->primaryKey => $id));
			$this->request->data = $this->Atleta->find('first', $options);
                        $this->set('atleta', $this->request->data);
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
		$this->Atleta->id = $id;
		if (!$this->Atleta->exists()) {
			throw new NotFoundException(__('Atleta inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Atleta->delete()) {
			$this->Session->setFlash(__('Atleta Excluido com Sucesso!'), 'sucesso');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Atleta não pode ser deletado!'), 'erro');
		$this->redirect(array('action' => 'index'));
	}
        
        
        /**
 * Busca Ajax
 */	
	public function busca(){
		$this->layout = 'branco';
		if ($this->request->is('post')){
			$this->set('atletas', $this->Atleta->find('all', 
								array('fields' => array('id', 'nome', 'cidade')
								,
									 'conditions' => 
									array('Atleta.status' => $this->data['status'],
										 'Atleta.nome LIKE' => '%'.$this->data['nome'].'%')
)));
}
		
	}
}
