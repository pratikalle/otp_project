<?php

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Signin_model');
	}

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {
		echo "Welcome!!!";
	}

}




?>