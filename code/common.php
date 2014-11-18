<?php
require_once 'debugUtil.php';
class Common {
	/**
	 * open error page and show message
	 *
	 * @param unknown $msg        	
	 */
	public function showError($msg) {
		$err = new ErrorView ();
		$err->build ( $msg );
		exit ();
	}
	/**
	 * date to string for mysql
	 *
	 * @param int $timestamp        	
	 * @return string
	 */
	public function dateString($timestamp) {
		return date ( 'Y-m-d', $timestamp );
	}
}
