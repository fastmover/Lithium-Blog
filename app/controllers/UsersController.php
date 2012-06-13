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
			$this->request->data['profile.publicName'] = true;
			$users = Users::create($this->request->data);
			$success = $users->save();
		}
		return compact('success');
	}
	public function edit() {
		if(!$this->request->params['id']){
			return $this->redirect('/users/');
		}
		//$user = Users::find('first', array('_id'=>$id));
		$success = false;
		$error = false;
		if ($this->request->data) {
			//Validate data here
			if(Users::update( array( 
					'username' => $this->request->data['username'],
					'access_level' => $this->request->data['access_level'],
					'email' => $this->request->data['email'],
					'fName' => $this->request->data['fName'],
					'lName' => $this->request->data['lName'],
					'profile.publicName' => $this->request->data['publicName'],
					'profile.twitter' => $this->request->data['twitter'],
					'profile.gplus' => $this->request->data['gplus'],
					'profile.facebook' => $this->request->data['facebook'],
					'profile.github' => $this->request->data['github']					
				),
				array( 
					'_id' => $this->request->data['id'] ) 
				)
			) {
				$updated = true;
			} else {
				$updated = false;
			}
		}
		$user = Users::first( $this->request->params['id'] );
		return compact('updated', 'user', 'error');
	}
	public function view(){
		if(!$this->request->params['id']){
			return $this->redirect('/users/');
		}
		$user = Users::first( $this->request->params['id'] );
		return compact( 'user' );
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