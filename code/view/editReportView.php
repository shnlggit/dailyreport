<?php
require_once 'baseView.php';
class EditReportView extends BaseView {
	public function build() {
		include ('../code/template/editReportTemplate.php');
	}
}
