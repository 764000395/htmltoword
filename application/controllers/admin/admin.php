<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$id = $this->session->userdata('id');
		$admin_name = $this->session->userdata('admin_name');
		$identity = $this->session->userdata('identity');
		if (empty($id) || empty($admin_name) || empty($identity)) {
			header('location:' . site_url('admin/login'));
		}
		$this->load->model('admin_model');
	}
	/*
		后台首页
	*/
	public function index() {
		$this->load->view('admin/index.html');
	}
	public function copy() {
		$this->load->view('admin/copy.html');
	}

	public function edit_password() {
		$this->load->view('admin/edit_password.html');
	}
	public function do_edit_password() {
		$username = $this->session->userdata('admin_name');
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$password2 = $this->input->post('password2');
		if ($new_password != $password2) {
			alert_msg('两次输入密码不一致！');
		}
		if (empty($old_password) || empty($new_password)) {
			alert_msg('密码不能为空');
		}
		$status = $this->admin_model->get_admin_info($username, md5($old_password));
		if (empty($status)) {
			alert_msg('旧密码不正确');
		}

		$admin_id = $status[0]['id'];
		$status = $this->db->update('admin', array('password' => md5($new_password)), array('id' => $admin_id));
		if ($status) {
			$this->session->unset_userdata(array('id', 'admin_name'));
			$this->session->sess_destroy();
			alert_msg('密码修改成功，请重新登录', 'go', site_url('admin/login'));
			header('location:' . site_url('admin/login'));
		} else {
			alert_msg('修改失败，请重试');
		}

	}
}
