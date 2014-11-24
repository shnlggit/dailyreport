<?php
class User {
	private $name;
	private $admin;
	private $id;
	/**
	 *
	 * @param unknown $data        	
	 */
	public function init($data) {
		$this->name = $data ['username'];
		$this->admin = $data ['admin'];
		$this->id = $data ['userid'];
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
	/**
	 *
	 * @param unknown $b        	
	 */
	public function setAdmin($b) {
		$this->admin = $b;
	}
	/**
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 *
	 * @param int $id        	
	 */
	public function setId($id) {
		$this->id = $id;
	}
}