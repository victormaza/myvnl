<?php 

	class LinksController extends AppController{

		public function add(){
			// vérifier si l'url est déjà en BDD
			if ($this->request->is('post')){
				$link = $this->Link->findByUrl($this->request->data['Link']['url']);
				if(empty($link)){
					//Créer le lien
					$this->Link->create($this->request->data, true);
					$this->Link->save(null, true, array('url'));
					$id = $this->Link->id;

				}
				else{
					//Récupérer le lien
					$id = $link['Link']['id'];
				}
				//envoie la variable id
				$this->set(compact('id'));
				// Renvoie vers la vue add-success
				$this->render('add-success');
			}
		}

		public function view($id){
			$link = $this->Link->findById($id);
			if(empty($link)){
				throw new NotFoundException();
			}
			return $this->redirect('http://'.$link['Link']['url'], 301);
		}

		public function admin_index(){
			$links = $this->Link->find('all');
			//envoie la variable id
			$this->set(compact('links'));
			// Renvoie vers la vue add-success
			$this->render('admin_index');
		}
	}
?>