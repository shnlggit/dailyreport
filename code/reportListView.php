<?php
require_once 'baseView.php';
class ReportListView extends BaseView {
	public function build() {
		include('reportListTemplate.php');
	}
}