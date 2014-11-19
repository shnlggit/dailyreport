<?php
require_once ("baseProcessor.php");
require_once ("../code/view/reportListView.php");
require_once ("../code/view/notFoundView.php");
class MenuReportListProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
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
		//DebugUtil::logln ( $query );
		$result = $this->getDb ()->query ( $query );
		//DebugUtil::log ( "result:" );
		//DebugUtil::logln ( $result );
		if ($result && $result->num_rows > 0) {
			if ($result->num_rows > 0) {
				//DebugUtil::logln ( "found" );
				// found user
				return $result;
			}
		} else {
			//DebugUtil::logln ( "not found" );
		}
		return null;
	}
}