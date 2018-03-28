<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->session->set_userdata('id', '1');
	}
	public function index() {
		$this->load->view('index.html');
	}
}
