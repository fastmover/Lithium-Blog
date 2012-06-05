<?php

namespace app\models;

class Pics extends \lithium\data\Model {

	public $validates = array();
	
	protected $_meta = array( 'source' => 'fs.files' );
}

?>