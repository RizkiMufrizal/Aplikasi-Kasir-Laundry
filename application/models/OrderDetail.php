<?php

class OrderDetail extends CI_Model
{
	public function save($data)
	{
		$val = [
			'uang' => $data['uang'],
			'jumlah' => $data['jumlah'],
			'satuan_berat' => $data['satuan_berat'],
			'order_id' => $data['order_id'],
			'paket_id' => $data['paket_id']
		];
		$this->db->insert('tb_order_detail', $val);
	}
}
