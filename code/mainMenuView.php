<?php
require_once 'baseView.php';
class MainMenuView extends BaseView {
	public function build() {
		include('mainMenuTemplate.php');
	}
}
