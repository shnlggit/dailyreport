<?php
require_once 'baseView.php';
class MainMenuView extends BaseView {
	public function build() {
		include ('../code/template/mainMenuTemplate.php');
	}
}
