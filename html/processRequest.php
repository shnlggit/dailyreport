<?php
require_once '../code/debugUtil.php';
require_once '../code/reportInputProcessor.php';
require_once '../code/errorView.php';

if (! isset ( $_POST ['requestClass'] )) {
	$err = new ErrorView ();
	$err->build ( "request class not found" );
	exit ();
}

DebugUtil::log ( 'post: ' );
DebugUtil::logln ( $_POST );

$className = $_POST ['requestClass'] . 'Processor';

$requestClass = new $className ();
$requestClass->process ();