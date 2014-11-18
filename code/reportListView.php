<?php
require_once 'baseView.php';
class ReportListView extends BaseView {
	private $qdata;
	public function build() {
		include('reportListTemplate.php');
	}
	public function setQueryResult($result){
		$this->qdata = $result;
	}
	private function buildCols(){
		if(!isset($this->qdata)){
			echo '<br><td>-</td><tr>';
		}
	}
}