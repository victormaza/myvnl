<?php

	class User extends AppModel{

		public $useTable = 'Users';
		public $hasAndBelongsToMany = array('Vinyl');
		public $hasMany = array('UserVinyl');

		 public $validate = array(
			'username' => array(
				array(
					'rule' => 'alphanumeric',
					'required' => true,
					'allowEmpty' => false, 
					'message' => 'Votre login n\'est pas valide.'
					),
				array(
					'rule' => 'isUnique',
					'message' => 'Ce login est déjà pris.'
					)
				),
			'email' => array(
				array(
					'rule' => 'email',
					'required' => true,
					'allowEmpty' => false, 
					'message' => 'Votre email n\'est pas valide.'
					),
				array(
					'rule' => 'isUnique',
					'message' => 'Ce email est déjà pris.'
					)
				),
			'password' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Vous devez remplir un mot de passe'
				)
			);

	}

?>