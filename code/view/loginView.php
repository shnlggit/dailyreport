<?php
require_once 'baseView.php';
class LoginView extends BaseView {
	public function build() {
		include ('../code/template/loginTemplate.php');
	}
}
