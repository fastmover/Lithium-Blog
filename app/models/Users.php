<?php

namespace app\models;

use lithium\util\Validator;
use lithium\security\Auth;
use lithium\util\collection\Filters;

class Users extends \lithium\data\Model {
	public  $_meta = array('locked' => false);
	protected $_schema = array(
		'_id' => array('type' => 'id'),
		'user_id' => array('type' => 'string'),
		'username' => array('type' => 'string'),
		'access_level' => array('type' => 'integer'),
		'email' => array('type' => 'email'),
		'fName' => array('type' => 'string'),
		'lName' => array('type' => 'string'),
		'profile' => array('type' => 'object'),
		'profile.publicName' => array('type' => 'boolean'),
		'profile.twitter' => array('type' => 'string'),
		'profile.gplus' => array('type' => 'string'),
		'profile.facebook' => array('type' => 'string'),
		'profile.github' => array('type' => 'string'),
		'signed_up' => array('type' => 'date'),
		'last_login' => array('type' => 'date')
	);
	public $validates = array(
	'username' => array(
			array('notEmpty', 'message' => 'You must include a username.')/*,
			array('uniqueUsername', 'message' => 'That username is currently taken.')
			// */
		),
		'password' => array(
			array('notEmpty', 'message' => 'You must include a password.')
		)/*,
		'email' => array(
			array('uniqueEmail', 'message' => 'That email is already registered in our database.')
		)
		// */
	);
	public $_user = array();
	public function name($record) {
		return "{$record->fName} {$record->lName}";
	}

	public static function __init() {
		
		
		
		Validator::add('uniqueEmail', function($value) {
			$current_user = Auth::check('default');
			if (!empty($current_user)) {
				$user = User::find('first', array(
							'fields' => array('_id'),
							'conditions' => array(
								'email' => $value,
								'_id' => array('$ne' => $current_user['_id'])
							)
						));
			} else {
				$user = User::find('first', array(
							'fields' => array('_id'),
							'conditions' => array('email' => $value)
						));
			}
			if (!empty($user)) {
				return false;
			}
			return true;
		});
		Validator::add('uniqueUsername', function($value) {
			$current_user = Auth::check('default');
			if (!empty($current_user)) {
				$user = Users::find('first', array(
							'fields' => array('_id'),
							'conditions' => array(
								'username' => $value,
								'_id' => array('$ne' => $current_user['_id'])
							)
						));
			} else {
				$user = Users::find('first', array(
							'fields' => array('_id'),
							'conditions' => array('username' => $value)
						));
			}
			if (!empty($user)) {
				return false;
			}
			return true;
		});
		
		
		// */
	}

}

/*Lazy loading password filter*/
Filters::apply('app\models\Users', 'save', function($self, $params, $chain) {

	//$salt = Password::salt('bf', 6);	

    if ($params['data']) {
        $params['entity']->set($params['data']);
        $params['data'] = array();
    }
    
    if(!empty($params['entity']->password)) {
		$params['entity']->password = Password::hash($params['entity']->password, $salt);
    }
    
    return $chain->next($self, $params, $chain);

});

?>