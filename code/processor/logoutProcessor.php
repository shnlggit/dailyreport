<?php
require_once ("baseProcessor.php");
class LogOutProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession ();
		
		if (UserManager::isLoggedIn ()) {
			UserManager::logout ();
		}
		
		$p = new IndexProcessor ();
		$p->process ();
	}
}