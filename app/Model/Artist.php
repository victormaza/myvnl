<?php

	class Artist extends AppModel{

		public $useTable = 'Artists'; 
		
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