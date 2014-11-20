<?php
require_once 'debugUtil.php';

define ( 'BASE_URL', 'http://localhost/daily_report' );
class Common {
	/**
	 * open error page and show message
	 *
	 * @param unknown $msg        	
	 */
	public static function showError($msg) {
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
	public static function dateString($timestamp) {
		return date ( 'Y-m-d', $timestamp );
	}
	/**
	 * start session if not
	 */
	public static function startSession() {
		if (session_status () == PHP_SESSION_NONE) {
			session_start ();
		}
	}
}
