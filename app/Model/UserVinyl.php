<?php

	class UserVinyl extends AppModel{


		public $useTable = 'Users_Vinyls';
		public $belongsTo = array('User', 'Vinyl');

	}

?>