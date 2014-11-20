<?php
require_once 'debugUtil.php';
require_once 'view/loginView.php';
require_once 'User.php';
class UserManager {
	/**
	 */
	public static function isLoggedIn() {
		return isset ( $_SESSION ['valid_user'] );
	}
	/**
	 *
	 * @param string $user        	
	 */
	public static function setLogIn($user) {
		$_SESSION ['valid_user'] = $user;
	}
	/**
	 */
	public static function showLogin() {
		$v = new LoginView ();
		$v->build ();
	}
	/**
	 *
	 * @return User
	 */
	public static function getUser() {
		return $_SESSION ['valid_user'];
	}
	public static function logout() {
		unset ( $_SESSION ['valid_user'] );
	}
}
