<?php

	class PlaceholditHelper extends AppHelper
	{
		public $helpers = array('Html');
		
		function image($w,$h)
		{
			return $this->Html->image('http://placehold.it/'. $w .'x'. $h);
		}
	}


?>