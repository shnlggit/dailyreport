<?php
require_once ("baseProcessor.php");
require_once ("mainMenuProcessor.php");
class LoginProcessor extends BaseProcessor {
	private $user;
	private $password;
	/**
	 */
	public function process() {
		Common::startSession ();
		
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
			
			$p = new MainMenuProcessor ();
			$p->process ();
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
		// DebugUtil::log ( sha1 ( $this->password ) );
		$query = "SELECT * FROM users WHERE username='" . $this->user . "' AND password='" . sha1 ( $this->password ) . "'";
		$result = $this->getDb ()->query ( $query );
		if ($result) {
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc ();
				// DebugUtil::log ( $row );
				// DebugUtil::log ( "pass" );
				$user = new User ();
				$user->init ( $row );
				UserManager::setLogIn ( $user );
				$result->free ();
			} else {
				$result->free ();
				throw new Exception ( "User not exist or wrong password" );
			}
		} else {
			throw new Exception ( "Login error!" );
		}
	}
}