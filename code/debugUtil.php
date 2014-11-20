<?php
define ( 'DEBUGMODE', true );
class DebugUtil {
	public static $debugColor = [ 
			0,
			128,
			0 
	];
	public static $errorColor = [ 
			255,
			0,
			0 
	];
	
	/**
	 *
	 * @param unknown $msg        	
	 */
	public static function log($msg) {
		if (! DEBUGMODE)
			return;
			
			// print '<span style="color: rgb(' . DEBUG_R . ',' . DEBUG_G . ',' . DEBUG_B . ');">';
		DebugUtil::colorStart ( DebugUtil::$debugColor );
		
		$traces = debug_backtrace ();
		if (isset ( $traces [0] )) {
			$trace = $traces [0];
			$locate = basename ( $trace ['file'] ) . '(' . $trace ['line'] . ')';
			print '&lt;' . $locate . ":&gt;";
		}
		
		print_r ( $msg );
		DebugUtil::colorEnd ();
		print '<br>';
	}
	/**
	 *
	 * @param unknown $msg        	
	 */
	public static function error($msg) {
		if (! DEBUGMODE)
			return;
		
		DebugUtil::colorStart ( DebugUtil::$errorColor );
		print ('ERROR:' . $msg . '<br>') ;
		print ('TRACE:<br>') ;
		$traces = debug_backtrace ();
		foreach ( $traces as $trace ) {
			print '&nbsp;&nbsp;' . $trace ['file'] . '(' . $trace ['line'] . ')<br>';
		}
		DebugUtil::colorEnd ();
	}
	/**
	 *
	 * @param array $color        	
	 */
	public static function colorStart($color) {
		print '<span style="color: rgb(' . $color [0] . ',' . $color [1] . ',' . $color [2] . ');">';
	}
	/**
	 */
	public static function colorEnd() {
		print '</span>';
	}
}

?>