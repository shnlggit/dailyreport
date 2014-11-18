<?php
require_once ("baseProcessor.php");
require_once ("reportListView.php");
class MenuReportListProcessor extends BaseProcessor {
	/**
	 */
	public function process() {
		$v = new ReportListView ();
		$v->build ();
	}
}