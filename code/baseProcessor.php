<?php
require_once ("debugUtil.php");
require_once ("errorView.php");
class BaseProcessor {
	protected $db;
	protected function dbconnect() {
		if (isset ( $db ))
			return;
		@ $this->db = new mysqli ( 'localhost', 'root', 'root', 'projectdb' );
		if (mysqli_connect_errno ()) {
			$this->showError ( "connect db error" );
			exit ();
		}
	}
	protected function dbclose() {
		if (! isset ( $db ))
			return;
		$db->close ();
		unset ( $db );
	}
	protected function getDb() {
		return $this->db;
	}
	protected function showError($msg) {
		$err = new ErrorView ();
		$err->build ( $msg );
	}
}