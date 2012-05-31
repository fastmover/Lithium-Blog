<?php

namespace app\controllers;

use lithium\security\Auth;

use app\models\Users;

class UsersController extends \lithium\action\Controller {

	public function login() {
		if($this->request->data) {
			//User posted to login
			$user = Auth::check('default', $this->request);
		} else {
			//Check if user is already logged in.
			$user = $user = Auth::check('default');
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
	public function index() {
		//return array('foo' => 'bar', 'title' => 'Posts');
		$users = Users::all();
		return compact('users');
	}
	public function add() {
		$success = false;
		if ($this->request->data) {
			$users = Users::create($this->request->data);
			$success = $users->save();
			return compact('success');
		} else {
			return false;
		}
	}
	public function edit($id=null) {
		if(!$id){
			return $this->redirect('/users/');
		}
		$success = false;
		if ($this->request->data) {
			if(Users::update( array( 
				'username' => $this->request->data['username'] ),
				array( 
					'_id' => $this->request->data['id'] ) 
				)
			) {
				$updated = true;
				return compact('updated');
			} else {
				$updated = false;
			}
			//$success = $user->save();
			//$success = true;
			return compact('updated');
		} else {
			//return false;
			$user = Users::find('first', array('_id'=>$id));
			return compact('user');
		}
	}
	public function view($id=null){
		if(!$id){
			return $this->redirect('/users/');
		}
		$user = Users::find('first', array('_id'=>$id));
		return compact('user');
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