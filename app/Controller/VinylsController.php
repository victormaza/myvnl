<?php

class VinylsController extends AppController{

	public $helpers =  array('Placeholdit');

	public $paginate = array(
		'limit' => 4,
		'order' => array('Vinyl.created ASC'),
		'paramType' => 'querystring',
		'recursive' => 0
		);

	public function index(){
		$vinyls = $this->paginate();
		$this->set(compact('vinyls'));
		$this->set('title_for_layout', 'Mes vinyls ');
		$this->render('index');
	}

	public function add(){
		if ($this->request->is('post')){
			$data = $this->request->data;
			$data['Vinyl']['year'] = $data['Vinyl']['year']['year'];
			$data['User']['id'] = $this->Auth->User('id');
			if (!empty($data)){
				$this->Vinyl->saveAssociated($data);
			}
			else{
				echo 'Erreur dans le formulaire';
			}
			$this->render('add-success');
		}
		$this->set('title_for_layout', 'Ajouter un vinyl');
	}



	public function view($slug){
		$vinyl = $this->Vinyl->find('first', array(
			'conditions' => array('Vinyl.slug' => $slug),
			'recursive' => 0
			)
		);

		$this->set('title_for_layout', $vinyl['Vinyl']['title']);
		$this->set(compact('vinyl'));
		$this->render('view');
	}

	// public function edit($id){
	// 	$post = $this->Post->find('first', array('fields' => array('title','content'),
	// 		'conditions' => array('id' => $id))
	// 	);
	// 	$this->Post->id = $id;
	// 	$this->set(compact('post'));
	// 	debug(strtolower($post['Post']['title']));
	// 	$this->render('edit');
	// 	if ($this->request->is('post')){
	// 		$data = $this->request->data;
	// 		$this->Post->save($data);
	// 		$this->render('edit-success');
	// 	}
	// 	else{
	// 		debug('Formulaire non posté');
	// 	}
		
	// 	$this->set('title_for_layout', 'Éditer '. $post['Post']['title']);
	// }

	
	// public function delete(){
	// 	//Si c'est bien une requête ajax
	// 	if($this->RequestHandler->isAjax()){
	// 		//on récupère le data envoyé (id)
	// 		$data = $this->request->data;
	// 		//on supprime le post correspondant à l'id
	// 		$this->Post->delete('first', array('conditions' => array($data['id'] => 'Post.id'));
	// 		$reponse = 'good';
	// 	 }else{
	// 	 	$reponse = 'bad';
	// 	 }
	// 	 echo json_encode($reponse);
	// }

}
?>
