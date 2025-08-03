<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model("order");
	}

    public function searchOrderNo() {
        $this->load->view('order/search_order_no');
    }

    public function resultSearchOrderNo($orderNo) {
        $dataOrder = $this->order->getByOrderNo($orderNo);
        if(!$dataOrder) {
            //data tidak tersedia
        }
        if($dataOrder['sudah_selesai'] == false) {
            //belum selesai
        }
        //sudah selesai
    }
}