<?php
require_once '../code/debugUtil.php';
require_once '../code/processor/reportInputProcessor.php';
require_once '../code/processor/menuReportInputProcessor.php';
require_once '../code/processor/menuReportListProcessor.php';
require_once '../code/view/errorView.php';

if (isset ( $_POST ['requestClass'] )) {
	DebugUtil::log ( 'post: ' );
	DebugUtil::logln ( $_POST );
	$className = $_POST ['requestClass'] . 'Processor';
	$requestClass = new $className ();
	$requestClass->process ();
} else if (isset ( $_GET ['type'] )) {
	DebugUtil::log ( 'get: ' );
	DebugUtil::logln ( $_GET );
	$className = $_GET ['type'] . 'Processor';
	$requestClass = new $className ();
	$requestClass->process ();
} else {
	$err = new ErrorView ();
	$err->build ( "request not found!" );
}

