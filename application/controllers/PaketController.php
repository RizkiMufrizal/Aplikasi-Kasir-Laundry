<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PaketController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		if(!$this->user->current_user()){
			redirect('auth/login');
		}

         $this->load->model("paket");
	}

	public function index()
	{
        $data["pakets"] = $this->paket->getAll();
        $this->load->view("paket/index", $data);
	}

    public function add() {
       $this->load->view("paket/add");
    }

    public function save() {
         $data = [
            'nama'  => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
        ];
        $this->paket->save($data);
        redirect("paket/index");
    }

    public function edit($id) {
        $data['paket'] = $this->paket->getById($id);
        $this->load->view('paket/edit', $data);
    }

    public function update($id) {
         $data = [
            'nama'  => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
        ];
        $this->paket->update($id, $data);
        redirect("paket/index");
    }

     public function delete($id) {
        $this->paket->delete($id);
        redirect("paket/index");
    }
}