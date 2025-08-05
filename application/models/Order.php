<?php

class Order extends CI_Model
{
	public function getByOrderNo($orderNo)
	{
		$this->db
			->select('o.id as order_id, o.no_order, o.total_uang, o.tanggal_transaksi, o.tanggal_selesai_cuci, o.sudah_selesai, c.nama, i.uang, i.jumlah, i.satuan_berat')
			->from('tb_order o')
			->join('tb_order_detail i', 'i.order_id = o.id')
			->join('tb_customer c', 'c.id = o.customer_id')
			->where('no_order', $orderNo);
		$query = $this->db->get();
		return $query->row();
	}

	public function getAll()
	{
		$query = $this->db
			->select('o.id as id, o.no_order, o.total_uang, o.tanggal_transaksi, o.tanggal_selesai_cuci, o.sudah_selesai, c.nama')
			->from('tb_order o')
			->join('tb_customer c', 'c.id = o.customer_id')
			->order_by('o.id', 'DESC')
			->get();
		$orders = $query->result_array();

		foreach ($orders as $i => $o) {
			$orders[$i]['items'] = $this->db
				->select('o.uang, o.jumlah, o.satuan_berat, p.nama')
				->from('tb_order_detail o')
				->join('tb_paket p', 'p.id = o.paket_id')
				->where('order_id', $o['id'])
				->get()
				->result_array();
		}
		return $orders;
	}

	public function getById($id)
	{
		return $this->db->get_where('tb_order', ["id" => $id])->row();
	}

	public function save($data)
	{
		$last = $this->db
			->order_by('id', 'DESC')
			->limit(1)
			->get('tb_order')
			->row();

		$val = [
			'no_order' => 'ORD' . $last->id,
			'total_uang' => 0,
			'tanggal_transaksi' => date('Y-m-d'),
			'tanggal_selesai_cuci' => $data['tanggal_selesai_cuci'],
			'sudah_selesai' => false,
			'customer_id' => $data['customer_id'],
		];
		$this->db->insert('tb_order', $val);
		return $this->db->insert_id();
	}

	public function updateTotalHarga($id, $totalUang)
	{
		$this->db->set('total_uang', $totalUang);
		$this->db->where('id', $id);
		$this->db->update('tb_order');
	}

	public function delete($id)
	{
		$this->db->trans_start();
		$this->db->delete('tb_order_detail', ['order_id' => $id]);
		$this->db->delete('tb_order', ['id' => $id]);
		$this->db->trans_complete();
	}
}
