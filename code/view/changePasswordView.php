<?php
require_once 'baseView.php';
class ChangePasswordView extends BaseView {
	public function build() {
		include ('../code/template/changePasswordTemplate.php');
	}
}
