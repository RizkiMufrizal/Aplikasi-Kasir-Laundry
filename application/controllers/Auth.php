<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		$this->load->model('user');
		$this->load->library('form_validation');

		$rules = $this->user->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->user->login($username, $password)) {
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
		}

		$this->load->view('login');
	}

	public function logout()
	{
		$this->load->model('user');
		$this->user->logout();
		redirect('auth/login');
	}
}
