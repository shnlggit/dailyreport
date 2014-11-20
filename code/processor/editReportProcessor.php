<?php
require_once ("baseProcessor.php");
require_once ("../code/view/editReportView.php");
class EditReportProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession();
		
		$v = new EditReportView ();
		$v->build ();
	}
}