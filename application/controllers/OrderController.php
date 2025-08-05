<?php

defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("order");
		$this->load->model("orderDetail");
		$this->load->model("customer");
		$this->load->model("paket");
	}

	public function searchOrderNo()
	{
		$this->load->view('order/search_order_no');
	}

	public function resultSearchOrderNo()
	{
		$orderNo = $this->input->post('order_no');
		$dataOrder['data'] = $this->order->getByOrderNo($orderNo);
		$this->load->view('order/search_order_no', $dataOrder);
	}

	public function index()
	{
		$this->checkAuth();
		$data["orders"] = $this->order->getAll();
		$this->load->view("order/index", $data);
	}

	public function add()
	{
		$this->checkAuth();
		$customers = $this->customer->getAllArray();

		$customerOptions[] = ['id' => '0', 'nama' => '-- Select Customer --'];
		foreach ($customers as $r) {
			array_push($customerOptions,
				['id' => $r['id'], 'nama' => $r['nama']]
			);
		}

		$pakets = $this->paket->getAllArray();

		$paketOptions[] = ['id' => '0', 'nama' => '-- Select Paket --', 'harga' => ''];
		foreach ($pakets as $r) {
			array_push($paketOptions,
				['id' => $r['id'], 'nama' => $r['nama'], 'harga' => $r['harga']]
			);
		}

		$data["customers"] = $customerOptions;
		$data["pakets"] = $paketOptions;
		$this->load->view("order/add", $data);
	}

	public function save()
	{
		$this->checkAuth();
		$customer = $this->input->post("customer");
		$pakets = $this->input->post("paket");
		$jumlahs = $this->input->post("jumlah");
		$tanggalSelesaiCuci = $this->input->post("tanggal_selesai_cuci");

		$totalUang = 0;
		$dataOrder = [
			'tanggal_selesai_cuci' => $tanggalSelesaiCuci,
			'customer_id' => $customer
		];
		$orderId = $this->order->save($dataOrder);

		foreach ($pakets as $i => $t) {
			$uang = intval(explode('|', $t)[1]) * $jumlahs[$i];
			$totalUang = $totalUang + $uang;
			$data = [
				'paket_id' => explode('|', $t)[0],
				'uang' => $uang,
				'jumlah' => $jumlahs[$i] ?? null,
				'satuan_berat' => 'Kg',
				'order_id' => $orderId
			];
			$this->orderDetail->save($data);
		}

		$this->order->updateTotalHarga($orderId, $totalUang);

		redirect("order/index");
	}

	public function delete($id)
	{
		$this->checkAuth();
		$this->order->delete($id);
		redirect("order/index");
	}

	function checkAuth()
	{
		$this->load->model('user');
		if (!$this->user->current_user()) {
			redirect('auth/login');
		}
	}
}
