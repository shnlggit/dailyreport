<?php
require_once ("baseProcessor.php");
class SavePasswordProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession ();
		if (! UserManager::isLoggedIn ()) {
			UserManager::showLogin ();
			return;
		}
		
		try {
			$this->checkParametersExist ( array (
					'oldpassword',
					'newpassword',
					'confirmpassword' 
			) );
			$this->checkData ();
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
		}
		
		$oldpw = $_POST ['oldpassword'];
		$newpw = $_POST ['newpassword'];
		
		$this->dbconnect ();
		
		try {
			$this->checkPassword ( $oldpw );
			$this->savePassword ( $newpw );
			
			$p = new MainMenuProcessor ();
			$p->process ();
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
		}
		
		$this->dbclose ();
	}
	/**
	 *
	 * @throws Exception
	 */
	private function checkData() {
		if ($_POST ['newpassword'] != $_POST ['confirmpassword']) {
			throw new Exception ( 'Not same!' );
		}
	}
	/**
	 *
	 * @param string $pswd        	
	 * @throws Exception
	 */
	private function checkPassword($pswd) {
		$user = UserManager::getUser ();
		$query = "SELECT * FROM users WHERE userid='" . $user->getId () . "' AND password='" . sha1 ( $pswd ) . "'";
		DebugUtil::log($query);
		$result = $this->getDb ()->query ( $query );
		if ($result) {
			if ($result->num_rows > 0) {
				$result->free ();
			} else {
				$result->free ();
				throw new Exception ( "Wrong password!" );
			}
		} else {
			throw new Exception ( "Check password error!" );
		}
	}
	/**
	 *
	 * @param string $newpw        	
	 * @throws Exception
	 */
	private function savePassword($newpw) {
		$user = UserManager::getUser ();
		$query = "UPDATE users SET password = '" . sha1 ( $newpw ) . "' WHERE userid='" . $user->getId () . "'";
		$result = $this->getDb ()->query ( $query );
		if (! $result) {
			throw new Exception ( "Save password error!" );
		}
	}
}