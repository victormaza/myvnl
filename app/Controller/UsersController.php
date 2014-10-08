<?php

class UsersController extends AppController
{

	public function beforeFilter() {
	    parent::beforeFilter();
	    // Permet aux utilisateurs de s'enregistrer et de se déconnecter
	    $this->Auth->allow('signup', 'logout');
	}
	public function profil(){
		$user = $this->Auth->User();
		$lol = $this->User->UserVinyl->find('all');
		debug($lol);
		debug($user['username']);
	}

	function signup(){
		if($this->request->is('post')){
			$data = $this->request->data;
			$data['User']['id'] = null;
			if(!empty($data['User']['password'])){
 				$data['User']['password'] = Security::hash($data['User']['password'],'sha1',true);
 			}
			if($this->User->save($data,true, array('username','email','password'))){
				$link = array('controller' => 'users', 'action' => 'activate', $this->User->id.'-'.md5($data['User']['password']));
				App::uses('CakeEmail','Network/Email');
				$mail = new CakeEmail();
				$mail->from('noreply@localhost.fr')
					->to($data['User']['email'])
					->subject('test inscription email')
					->emailFormat('html')
					->template('signup')
					->viewVars(array(
						'username' => $data['User']['username'],
						'link' => $link)
					)
					->send();
				$this->Session->setFlash('Dernière chose, active ton compte via l\'email que tu viens de recevoir.','notif');
			}
			else{
				$this->Session->setFlash('Merci de corriger vos erreurs','notif',array('type' =>'warning'));			
			}
		}
	}

	function activate($token){
		$token = explode('-', $token);
		$user = $this->User->find('first', array(
			'conditions' => array(
				'id' => $token[0],
				'md5(User.password)' => $token,
				'active' => 0
				)
			)
		);
		if(!empty($user)){
			$this->User->id = $user['User']['id'];
			$this->User->saveField('active',1);
			$this->Session->setFlash('Et voilà, ton compte a été activé !','notif');
			$this->Auth->login($user['User']);
		}else{
			$this->Session->setFlash('Le lien d\'activation n\'est pas valide !', 'notif',array('type' =>'warning'));	
		}
		$this->redirect('/vinyls');
	}

	public function login(){
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
		    	$this->Session->setFlash('Tu es connecté !','notif');
		        return $this->redirect(array('controller' => 'Vinyls', 'action' => 'index'));
		    } else {
		        $this->Session->setFlash('Identifiants incorrects !','notif',array('type' =>'warning'));
		    }
		}
	}

	public function logout(){
		$this->Auth->logout();
		return $this->redirect('/');
	}

}
?>