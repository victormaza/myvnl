<?php

	class Vinyl extends AppModel{

		public $useTable = 'Vinyls';
		public $hasAndBelongsToMany = array('User');
		public $hasMany = array('UserVinyl');
		
		public $belongsTo = array( 
			'Label' => array(
				'fields' => array('name')
				),
			'Artist' => array(
				'fields' => array('name')
				),
			'Genre' => array(
				'fields' => array('name'),
				'counterCache' => true
				)
			);

		public function beforeSave($options = array()){
			if(
				isset($this->data[$this->alias]['title']) && 
				!isset($this->data[$this->alias]['slug'])
			){
				$this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['title'],'-'));
			}
			
		}
		public $validate = array(
			'cover_file' => array(
				'rule' => array('FileExtension', array('jpg','jpeg','png')),
				'message' => 'Tu ne peux pas uploader ce type de fichier.' 
				)
		);

		// vérifier que l'extension est bien jpg,jpeg ou png
		public function FileExtension($check,$extensions,$allowEmpty = true){
			$file = current($check);
			// allowEmpty
			if($allowEmpty && empty($file['tmp_name'])){
				return true;
			}
			$extension = strtolower(pathinfo($file['cover_file']['name'], PATHINFO_EXTENSION));
			$cover_name = $data['Vinyl']['title'].'-'.$data['Artist']['name'].'.'.$extension;
			return in_array($extension, $extensions);
		}

		// save cover
		public function afterSave($created, $options = array()){
			if (isset($this->data[$this->alias]['cover_file'])) {
				$file = $this->data[$this->alias]['cover_file'];
				$extension = strtolower(pathinfo($file['cover_file']['name'], PATHINFO_EXTENSION));
				if( !empty($file['tmp_name'])){
					move_uploaded_file(
						$file['tmp_name'], 
						IMAGES.'covers'.DS.$cover_name
						);
					$this->saveField('cover',$cover_name);
				}
			}
		}
		// public function afterFind($results, $primary = false){
		// 	foreach ($results as $k => $result) {
		// 		if(
		// 			isset($result[$this->alias]['id']) && 
		// 			isset($result[$this->alias]['slug'])
		// 		){
		// 			$results[$k][$this->alias]['url'] = array (
		// 				'controller' => 'vinyls',
		// 				'action' => 'view',
		// 				'slug' => $result[$this->alias]['slug']
		// 				);
		// 		}
				
		// 	}
		// 	return $results;
		// }
	
	}
?>