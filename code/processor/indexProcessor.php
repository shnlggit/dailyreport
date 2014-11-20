<?php
require_once ("baseProcessor.php");
require_once ("../code/view/mainMenuView.php");
require_once ("../code/userManager.php");
class IndexProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession();
		if (! UserManager::isLoggedIn ()) {
			UserManager::showLogin ();
			return;
		}
		
		$v = new MainMenuView ();
		$v->build ();
	}
}