<?php
require_once 'baseView.php';
class ReportInputView extends BaseView {
	public function build() {
		include('reportInputTemplate.php');
	}
}
