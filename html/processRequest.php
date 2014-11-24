<?php
require_once '../code/debugUtil.php';
require_once '../code/view/errorView.php';
require_once '../code/processor/processors.php';

if (isset ( $_POST ['requestClass'] )) {
	// DebugUtil::log ( 'post: ' );
	// DebugUtil::log ( $_POST );
	$className = $_POST ['requestClass'] . 'Processor';
	$requestClass = new $className ();
	$requestClass->process ();
} else if (isset ( $_GET ['type'] )) {
	// DebugUtil::log ( 'get: ' );
	// DebugUtil::log ( $_GET );
	$className = $_GET ['type'] . 'Processor';
	$requestClass = new $className ();
	$requestClass->process ();
} else {
	$err = new ErrorView ();
	$err->build ( "request not found!" );
}

