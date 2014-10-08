<?php

class Question extends AppModel {
    
	public $belongsTo = array(
		'Content' => array(
			'counterCache' => true));   
}