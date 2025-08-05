<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		if (!$this->user->current_user()) {
			redirect('auth/login');
		}

		$this->load->model("customer");
	}

	public function index()
	{
		$data["customers"] = $this->customer->getAll();
		$this->load->view("customer/index", $data);
	}

	public function add()
	{
		$this->load->view("customer/add");
	}

	public function save()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp')
		];
		$this->customer->save($data);
		redirect("customer/index");
	}

	public function edit($id)
	{
		$data['customer'] = $this->customer->getById($id);
		$this->load->view('customer/edit', $data);
	}

	public function update($id)
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp')
		];
		$this->customer->update($id, $data);
		redirect("customer/index");
	}

	public function delete($id)
	{
		$this->customer->delete($id);
		redirect("customer/index");
	}
}
