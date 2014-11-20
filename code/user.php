<?php
class User {
	private $name;
	private $admin;
	/**
	 *
	 * @param unknown $data        	
	 */
	public function init($data) {
		$this->name = $data ['username'];
		$this->admin = $data ['admin'];
	}
	/**
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 *
	 * @param string $name        	
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 *
	 * @return bool
	 */
	public function isAdmin() {
		return $this->admin;
	}
	public function setAdmin($b) {
		$this->admin = $b;
	}
}