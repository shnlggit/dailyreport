<?php
require_once ("baseProcessor.php");
require_once ("reportInputView.php");
class MenuReportInputProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		$v = new ReportInputView ();
		$v->build ();
	}
}