<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {

	/*
		管理员验证
	*/
	public function get_admin_info($username, $password) {
		$status = $this->db->select('id, identity')->get_where('admin', array('username' => $username, 'password' => $password))->result_array();
		return $status;
	}
}
?>