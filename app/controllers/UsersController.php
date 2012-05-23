<?php

namespace app\controllers;

use lithium\security\Auth;

class UsersController extends \lithium\action\Controller {

	public function login() {
		if($this->request->data) {
			$user = Auth::check('default', $this->request);
		}
		if(isset($user) && ($user)) {
			$this->redirect('/posts');
		}
		$data = $this->request->data;
		//print_r($data);
		return compact('data');
		
		
		/*if (Auth::check('default', $this->request)) {
			return $this->redirect('/');
		}*/
		
	}
	public function logout() {
		Auth::clear('default');
		return $this->redirect('/');
	}
	public function signup() {
		if($this->request->data) {
			//create account here
			return true;
		} else {
			return false;
		}
	}
}

?>