<?php
require_once ("baseProcessor.php");
require_once ("mainMenuProcessor.php");
class LoginProcessor extends BaseProcessor {
	private $user;
	private $password;
	/**
	 */
	public function process() {
		Common::startSession();
		
		try {
			$this->checkFillOut ();
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
			exit ();
		}
		
		$this->user = $_POST ['user'];
		$this->password = $_POST ['password'];
		
		$this->dbconnect ();
		
		try {
			$this->login ();
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
			exit ();
		}
		
		$this->dbclose ();
	}
	/**
	 *
	 * @throws Exception
	 */
	private function checkFillOut() {
		if (! isset ( $_POST ['user'] ) || ! isset ( $_POST ['password'] )) {
			throw new Exception ( "Request error!" );
		}
		if ($_POST ['user'] == '') {
			throw new Exception ( "Input your username" );
		}
		// password can be empty
	}
	/**
	 */
	private function login() {
		//DebugUtil::log ( sha1 ( $this->password ) );
		$query = "SELECT * FROM users WHERE username='" . $this->user . "'";
		$result = $this->getDb ()->query ( $query );
		if ($result) {
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc ();
				//DebugUtil::log ( $row );
				if ($row ['password'] == sha1 ( $this->password )) {
					//DebugUtil::log ( "pass" );
					$user = new User ();
					$user->init ( $row );
					UserManager::setLogIn ( $user );
					$result->free ();
					if (UserManager::isLoggedIn ()) {
						//DebugUtil::log ( "logged in" );
						$v = new MainMenuProcessor ();
						$v->process ();
					} else {
						//DebugUtil::log ( "not logged in" );
					}
				} else {
					$result->free ();
					throw new Exception ( "Wrong password!" );
				}
			} else {
				$result->free ();
				throw new Exception ( "User not exist!" );
			}
		} else {
			throw new Exception ( "User not exist!" );
		}
	}
}