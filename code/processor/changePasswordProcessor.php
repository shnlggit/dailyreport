<?php
require_once "baseProcessor.php";
require_once '../code/view/changePasswordView.php';
class ChangePasswordProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession ();
		if (! UserManager::isLoggedIn ()) {
			UserManager::showLogin ();
			return;
		}
		
		$v = new ChangePasswordView ();
		$v->build ();
	}
}