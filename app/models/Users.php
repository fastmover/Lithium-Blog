<?php

	namespace app\models;

	class Users extends \lithium\data\Model {
		protected $_schema = array(
			'_id' => array('type' => 'id'),
			'user_id' => array('type' => 'string'),
			'access_level' => array('type' => 'integer'),
			'email' => array('type' => 'email'),
			'fName' => array('type' => 'string'),
			'lName' => array('type' => 'string'),
			'profile' => array( 'type' => 'object' ),
			'profile.publicName' => array('type' => 'boolean'),
			'profile.twitter' => array('type' => 'string'),
			'profile.gplus' => array('type' => 'string'),
			'profile.facebook' => array('type' => 'string'),
			'profile.github' => array('type' => 'string'),
			'signed_up' => array('type' => 'date'),
			'last_login' => array('type' => 'date')
			
		);
		public function name($record) {
			return "{$record->fName} {$record->lName}";
		}
	}

?>