<?php
require_once 'baseView.php';
class ReportListView extends BaseView {
	private $qdata;
	public function build() {
		include ('../code/template/reportListTemplate.php');
	}
	public function setQueryResult($result) {
		$this->qdata = $result;
	}
	private function buildCols() {
		if (! isset ( $this->qdata )) {
			echo '<tr><td>-</td></tr>';
			return;
		}
		$row = $this->qdata->fetch_assoc ();
		echo '<tr>';
		foreach ( $row as $key => $value ) {
			echo '<td>' . $key . '</td>';
		}
		echo '</tr>';
		while ( isset ( $row ) ) {
			echo '<tr>';
			foreach ( $row as $key => $value ) {
				echo '<td>' . $value . '</td>';
			}
			echo '</tr>';
			$row = $this->qdata->fetch_assoc ();
		}
	}
}