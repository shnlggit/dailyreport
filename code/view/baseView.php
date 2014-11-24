<?php
require_once '../code/common.php';
require_once '../code/userManager.php';
class BaseView {
	public function build() {
	}
	public function buildUserPanel() {
		if (UserManager::isLoggedIn ()) {
			echo UserManager::getUser ()->getName ();
			echo '  <a href="' . BASE_URL . '/processRequest.php?type=logout">logout</a>';
			echo '  <a href="' . BASE_URL . '/processRequest.php?type=changepassword">change password</a>';
			echo '<br>';
		} else {
			echo 'Not Logged in<br>';
		}
	}
}