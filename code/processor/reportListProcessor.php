<?php
require_once ("baseProcessor.php");
require_once ("../code/view/reportListView.php");
require_once ("../code/view/notFoundView.php");
class ReportListProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession();
		
		$this->dbconnect ();
		
		$result = $this->getList ();
		
		if (isset ( $result )) {
			$v = new ReportListView ();
			$v->setQueryResult ( $result );
			$v->build ();
		} else {
			$v = new NotFoundView ();
			$v->build ();
		}
		
		$result->free ();
		
		$this->dbclose ();
	}
	private function getList() {
		$query = "SELECT users.username,reports.date,reports.content FROM projectdb.reports,projectdb.users WHERE reports.userid=users.userid";
		// DebugUtil::log ( $query );
		$result = $this->getDb ()->query ( $query );
		// DebugUtil::log ( "result:" );
		// DebugUtil::log ( $result );
		if ($result && $result->num_rows > 0) {
			// DebugUtil::log ( "found" );
			// found user
			return $result;
		} else {
			// DebugUtil::log ( "not found" );
		}
		return null;
	}
}