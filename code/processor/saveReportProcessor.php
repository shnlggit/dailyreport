<?php
require_once ("baseProcessor.php");
class SaveReportProcessor extends BaseProcessor {
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
					'name',
					'year',
					'month',
					'day',
					'content' 
			) );
			$this->checkData ( $_POST );
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
		}
		
		$name = $_POST ['name'];
		$year = $_POST ['year'];
		$month = $_POST ['month'];
		$day = $_POST ['day'];
		$content = $_POST ['content'];
		
		$this->dbconnect ();
		try {
			// $userid = $this->findUser ( $name );
			// if ($userid < 0) {
			// $userid = $this->createUser ( $user );
			// }
			// DebugUtil::log ( 'userid:' . $userid );
			
			$date = mktime ( 0, 0, 0, $month, $day, $year );
			// DebugUtil::log ( Common::dateString ( $date ) );
			$this->saveReport ( $date, $content );
			
			$p = new ReportListProcessor ();
			$p->process ();
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
		}
		$this->dbclose ();
	}
	/**
	 *
	 * @param array $formVars        	
	 * @throws Exception
	 */
	private function checkData($formVars) {
		foreach ( $formVars as $key => $value ) {
			if (! isset ( $key ) || ($value == '')) {
				throw new Exception ( 'Form not filled out!' );
			}
		}
		
		if (! checkdate ( $formVars ['month'], $formVars ['day'], $formVars ['year'] )) {
			throw new Exception ( 'Invalid date!' );
		}
	}
	/**
	 *
	 * @param string $name        	
	 * @return int userid
	 */
	/*
	 * private function findUser($name) {
	 * $query = "SELECT * FROM `users` WHERE `username`='" . $name . "'";
	 * // DebugUtil::log ( $query );
	 * $result = $this->getDb ()->query ( $query );
	 * // DebugUtil::log ( $result );
	 * if ($result && $result->num_rows > 0) {
	 * if ($result->num_rows > 0) {
	 * // DebugUtil::log ( "found" );
	 * // found user
	 * $row = $result->fetch_array ();
	 * // DebugUtil::log ( $row );
	 * $result->free ();
	 * return $row ['userid'];
	 * } else {
	 * $result->free ();
	 * }
	 * } else {
	 * // DebugUtil::log ( "not found" );
	 * }
	 * return - 1;
	 * }
	 */
	/**
	 *
	 * @param string $name        	
	 * @return int userid
	 */
	/*
	 * private function createUser($name) {
	 * $query = "INSERT INTO `users` (`username`) VALUES ('" . $name . "')";
	 * $result = $this->getDb ()->query ( $query );
	 * if ($result) {
	 * return findUser ( $name );
	 * } else {
	 * // DebugUtil::log ( "create user failed!" );
	 * }
	 * return - 1;
	 * }
	 */
	/**
	 *
	 * @param int $userid        	
	 * @param int $date        	
	 * @param string $content        	
	 */
	private function saveReport($date, $content) {
		$user = UserManager::getUser ();
		$query = "INSERT INTO `reports` (`userid`, `date`, `content`) VALUES ('" . $user->getId () . "', '" . Common::dateString ( $date ) . "', '" . $content . "')";
		// DebugUtil::logln ( $query );
		$result = $this->getDb ()->query ( $query );
		if (! $result) {
			throw new Exception ( 'Save report error!' );
		}
	}
}