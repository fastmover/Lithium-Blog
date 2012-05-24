<?php
namespace app\extensions\helper;
use lithium\security\Auth;

class Login extends \lithium\template\Helper {
	public function user() {
		$user = Auth::check('default');
		return $user;
	}
	public function userName() {
		$user = self::user();
		return $user["username"];
	}
	public function fullName() {
		$user = self::user();
		return $user["first_name"] . " " . $user["last_name"];
	}
}
?>