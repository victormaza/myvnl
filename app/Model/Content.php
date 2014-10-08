<?php

class Content extends AppModel {
    
    public $hasMany = 'question';

    public $validate = array(
        'titre' => array(
            'rule'    => array('maxLength', '200'),
            'required' => true,
            'allowEmpty' => false,
            'message' => "Vous devez rentrer un titre valide"
        ));
    
}