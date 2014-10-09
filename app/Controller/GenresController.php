<?php

	
	class GenresController extends AppController {

		public function index(){
			$genres = $this->Genre->find('all', array('fields' => array('name','genre_count')));

			for ($i=0; $i < count($genres); $i++) { 
				//debug($genres[$i]['Genre']);
				$genreJson[0] = $genres[$i]['Genre']['name'];
				$genreJson[1] = $genres[$i]['Genre']['genre_count'];
			}
			debug($genreJson); 
			debug(json_encode($genreJson, JSON_NUMERIC_CHECK));
			$this->set(compact('genres'));
			$this->set('title_for_layout', 'Mes Genre 2 ouf ');
			$this->render('index');

		}

	}

?>