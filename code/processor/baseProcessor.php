<?php
require_once ("../code/debugUtil.php");
require_once ("../code/common.php");
require_once ("../code/view/errorView.php");
require_once ("../code/userManager.php");
class BaseProcessor {
	protected $db;
	/**
	 */
	protected function dbconnect() {
		if (isset ( $db ))
			return;
		@ $this->db = new mysqli ( 'localhost', 'root', 'root', 'projectdb' );
		if (mysqli_connect_errno ()) {
			$this->showError ( "connect db error" );
			exit ();
		}
	}
	/**
	 */
	protected function dbclose() {
		if (! isset ( $db ))
			return;
		$db->close ();
		unset ( $db );
	}
	/**
	 *
	 * @return mysqli
	 */
	protected function getDb() {
		return $this->db;
	}
	/**
	 *
	 * @param unknown $msg        	
	 */
	protected function showError($msg) {
		$err = new ErrorView ();
		$err->build ( $msg );
	}
	/**
	 */
	protected function checkParametersExist($parameters, $method = 'post') {
		$vars = $_POST;
		if (isset ( $method ) && $method == 'get') {
			$vars = $_GET;
		}
		if (isset ( $parameters ) && is_array ( $parameters )) {
			foreach ( $parameters as $param ) {
				if (! isset ( $vars [$param] )) {
					throw new Exception ( "Lost parameter" );
				}
			}
		}
	}
}