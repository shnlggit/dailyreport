<?php
require_once ("baseProcessor.php");
require_once ("../code/view/reportInputView.php");
class MenuReportInputProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		Common::startSession();
		
		$v = new ReportInputView ();
		$v->build ();
	}
}