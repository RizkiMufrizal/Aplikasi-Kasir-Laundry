<?php

class Customer extends CI_Model
{
	function getAll()
	{
		$query = $this->db->get('tb_customer');
		return $query->result();
	}

	function getAllArray()
	{
		$query = $this->db->get('tb_customer');
		return $query->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('tb_customer', ["id" => $id])->row();
	}

	function save($data)
	{
		$val = array(
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'no_hp' => $data['no_hp']
		);
		$this->db->insert('tb_customer', $val);
	}

	function update($id, $data)
	{
		$val = array(
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'no_hp' => $data['no_hp']
		);
		$this->db->where('id', $id);
		$this->db->update('tb_customer', $val);
	}

	function delete($id)
	{
		$val = array(
			'id' => $id
		);
		$this->db->delete('tb_customer', $val);
	}
}
