<?php
require_once ("baseProcessor.php");
require_once ("common.php");
class ReportInputProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		$name = $_POST ['name'];
		$year = $_POST ['year'];
		$month = $_POST ['month'];
		$day = $_POST ['day'];
		$content = $_POST ['content'];
		
		try {
			$this->checkData ( $_POST );
			
			$this->dbconnect ();
			
			$userid = $this->findUser ( $name );
			if ($userid < 0) {
				$userid = $this->createUser ( $user );
			}
			DebugUtil::logln ( 'userid:' . $userid );
			
			$date = mktime ( 0, 0, 0, $month, $day, $year );
			DebugUtil::logln ( Common::dateString ( $date ) );
			
			$this->saveReport ( $userid, $date, $content );
			
			$this->dbclose ();
		} catch ( Exception $e ) {
			Common::showError ( $e->getMessage () );
		}
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
	private function findUser($name) {
		$query = "SELECT * FROM `users` WHERE `username`='" . $name . "'";
		DebugUtil::logln ( $query );
		$result = $this->getDb ()->query ( $query );
		DebugUtil::log ( "result:" );
		DebugUtil::logln ( $result );
		if ($result && $result->num_rows > 0) {
			if ($result->num_rows > 0) {
				DebugUtil::logln ( "found" );
				// found user
				$row = $result->fetch_array ();
				DebugUtil::logln ( $row );
				$result->free ();
				return $row ['userid'];
			} else {
				$result->free ();
			}
		} else {
			DebugUtil::logln ( "not found" );
			$this->createUser ( $name );
		}
	}
	/**
	 *
	 * @param string $name        	
	 * @return int userid
	 */
	private function createUser($name) {
		$query = "INSERT INTO `users` (`username`) VALUES ('" . $name . "')";
		$result = $this->getDb ()->query ( $query );
		if ($result) {
			return findUser ( $name );
		} else {
			DebugUtil::logln ( "create user failed!" );
		}
		return - 1;
	}
	/**
	 *
	 * @param int $userid        	
	 * @param int $date        	
	 * @param string $content        	
	 */
	private function saveReport($userid, $date, $content) {
		$query = "INSERT INTO `reports` (`userid`, `date`, `content`) VALUES ('" . $userid . "', '" . Common::dateString ( $date ) . "', '" . $content . "')";
		DebugUtil::logln ( $query );
		$result = $this->getDb ()->query ( $query );
		if ($result) {
			DebugUtil::logln ( 'Report saved.' );
		} else {
			DebugUtil::logln ( 'Save report failed.' );
		}
	}
}