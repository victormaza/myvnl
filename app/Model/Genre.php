<?php

	class Genre extends AppModel{


		public $useTable = 'Genres'; 
		public function beforeSave($options = array()){
			if(
				isset($this->data[$this->alias]['name']) && 
				!isset($this->data[$this->alias]['slug'])
			){
				$this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['name'],'-'));
			}
			
		}

	}

?>