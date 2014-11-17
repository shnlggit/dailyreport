<?php
require_once 'baseView.php';
class ErrorView extends BaseView {
	public function build($msg) {
		$errorMsg = $msg;
		include('errorTemplate.php');
	}
}
