<?php

class Paket extends CI_Model
{
	function getAll()
	{
		$query = $this->db->get('tb_paket');
		return $query->result();
	}

	function getAllArray()
	{
		$query = $this->db->get('tb_paket');
		return $query->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('tb_paket', ["id" => $id])->row();
	}

	function save($data)
	{
		$val = array(
			'nama' => $data['nama'],
			'harga' => $data['harga']
		);
		$this->db->insert('tb_paket', $val);
	}

	function update($id, $data)
	{
		$val = array(
			'nama' => $data['nama'],
			'harga' => $data['harga']
		);
		$this->db->where('id', $id);
		$this->db->update('tb_paket', $val);
	}

	function delete($id)
	{
		$val = array(
			'id' => $id
		);
		$this->db->delete('tb_paket', $val);
	}
}
