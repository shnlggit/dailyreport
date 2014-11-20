<?php
require_once '../code/common.php';
require_once '../code/userManager.php';
class BaseView {
	public function build() {
	}
	public function buildUserPanel() {
		if (UserManager::isLoggedIn ()) {
			echo UserManager::getUser ()->getName ();
			echo '  ';
			echo '<a href="' . BASE_URL . '/processRequest.php?type=logout">logout</a>';
			echo '<br>';
		} else {
			echo 'Not Logged in<br>';
		}
	}
}